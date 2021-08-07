<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;



class PaymentController extends Controller
{
    protected $paymentModel;
    protected $orderModel;

    public function __construct()
    {
        $this->paymentModel = new Payment();
        $this->orderModel = new Order();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = $this->paymentModel->getPaymentList();

        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        return view('payment.invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Update Cart Data
        foreach(range(0, Cart::count()-1) as $i)
        {
            Cart::update($request->id[$i], ['options' => ['details' => $request->post[$i]]]);
        }

        // Check If User Currently Have Pending Order
        if($this->paymentModel->checkWaiting() > 0)
        {
            return redirect()->route('buyer.user_order_list')->with('message', 'Anda Memiliki Order Yang Belum Dibayar');
        }

        // Check User's Payment Method
        // Check If User's Use Saldo
        if($request->payment_method == 'saldo')
        {
            // Check If User's Balance is Sufficient
            if( Auth::user()->balance < Cart::subtotal() ){
                return redirect()->route('cart.index')->with('message_1', 'Saldo Anda Tidak Cukup');
            }
            else
            {
                // Save Cart Data To Payment Table
                $this->paymentModel->users_id       =   Auth::id();
                $this->paymentModel->order_details  =   Cart::content();
                $this->paymentModel->status         =   'paid';
                $this->paymentModel->payment_method =   $request->payment_method;
                $this->paymentModel->save();

                // Save Data To Orders
                foreach(Cart::content() as $content =>  $collection)
                {
                    $order = Order::create([
                        'order_number'  =>  strtoupper(Str::random(10)),
                        'users_id'      =>  Auth::id(),
                        'order_type'    =>  1,
                        'price'         =>  $collection->price,
                        'order_status'  =>  'Menunggu Pengiriman',
                        'details'       =>  $collection->options->details,
                        'result'        =>  ''
                    ]);

                    $order->website()->attach($collection->id);
                }

                // Update User's Balance
                $newSaldo = Auth::user()->balance - Cart::subtotal();
                User::where('id', Auth::id())->update([
                    'balance' =>  $newSaldo,
                ]);

                // // Delete Cart Content
                Cart::destroy();

                return redirect()->route('payment.index')->with('message', 'Pembayaran Berhasil, Pesanan Akan Diteruskan Ke Penjual');
            }
        }
        // If User Use Bank Transfer
        else
        {

        }

        // return redirect()->route('payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
