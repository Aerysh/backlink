<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;
use ImageOptimizer;




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
        // Check User's Payment Method
        // Check If User's Use Balance instead of bank transfer
        if($request->payment_method == 'saldo')
        {
            // Check If User's Balance is Sufficient
            $newSaldo = Auth::user()->balance - Cart::subtotal();
            if( Auth::user()->balance < Cart::subtotal() || $newSaldo < 0){
                return redirect()->route('cart.index')->with('message_1', 'Saldo Anda Tidak Cukup');
            }
            else
            {
                // Update Cart Data
                    // Check Order Type
                    // If Order Type == 2 add 75000 to item's Price
                    // Else Update Without New Price
                    $i = 0;
                    foreach(Cart::content() as $row){
                        if($request->order_type[$i] == 2)
                        {
                            Cart::update($request->id[$i], [
                                'price' => $row->price + 75000,
                                'options' => [
                                    'details' => $request->post[$i],
                                    'order_type' => $request->order_type[$i],
                                    'users_website' =>  $request->users_website,
                                    ]
                                ]);
                        }else{
                            Cart::update($request->id[$i], [
                                'price' => $row->price,
                                'options' => [
                                    'details' => $request->post[$i],
                                    'order_type' => $request->order_type[$i],
                                    'users_website' =>  $request->users_website,
                                    ]
                                ]);
                        }
                        $i++;
                    }

                // Save Cart Data To Payment Table
                $this->paymentModel->users_id       =   Auth::id();
                $this->paymentModel->order_details  =   Cart::content();
                $this->paymentModel->status         =   'Telah Dibayar';
                $this->paymentModel->payment_method =   $request->payment_method;
                $this->paymentModel->save();

                // Save Data To Orders
                foreach(Cart::content() as $content =>  $collection)
                {
                    $order = Order::create([
                        'order_number'  =>  strtoupper(Str::random(10)),
                        'users_id'      =>  Auth::id(),
                        'order_type'    =>  $collection->options->order_type,
                        'price'         =>  $collection->price,
                        'order_status'  =>  'Menunggu Pengiriman',
                        'details'       =>  $collection->options->details . '<br> Website Tujuan : ' . $collection->options->users_website,
                        'result'        =>  ''
                    ]);

                    $order->website()->attach($collection->id);
                }

                // Update User's Balance
                $newSaldo = Auth::user()->balance - Cart::subtotal();
                User::where('id', Auth::id())->update([
                    'balance' =>  $newSaldo,
                ]);

                // Delete Cart Content
                Cart::destroy();

                return redirect()->route('payment.index')->with('message', 'Pembayaran Berhasil, Pesanan Akan Diteruskan Ke Penjual');
            }
        }
        // If User Use Bank Transfer
        else
        {
            // Check If User Currently Have Pending Order
            if($this->paymentModel->checkWaiting() > 0)
            {
                return redirect()->route('payment.index')->with('message', 'Anda Memiliki Order Yang Belum Dibayar');
            }

            // Update Cart Data
                // Check Order Type
                // If Order Type == 2 add 75000 to item's Price
                // Else Update Without New Price
                $i = 0;
                foreach(Cart::content() as $row){
                    if($request->order_type[$i] == 2)
                    {
                        Cart::update($request->id[$i], [
                            'price' => $row->price + 75000,
                            'options' => [
                                'details' => $request->post[$i],
                                'order_type' => $request->order_type[$i],
                                'users_website' =>  $request->users_website,
                                ]
                            ]);
                    }else{
                        Cart::update($request->id[$i], [
                            'price' => $row->price,
                            'options' => [
                                'details' => $request->post[$i],
                                'order_type' => $request->order_type[$i],
                                'users_website' =>  $request->users_website,
                                ]
                            ]);
                    }
                    $i++;
                }

                // Save Cart Data To Payment Table
                $this->paymentModel->users_id       =   Auth::id();
                $this->paymentModel->order_details  =   Cart::content();
                $this->paymentModel->status         =   'Menunggu Pembayaran';
                $this->paymentModel->payment_method =   $request->payment_method;
                $this->paymentModel->save();

                Cart::destroy();

                return redirect()->route('payment.show', ['id' => $this->paymentModel->id]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = $this->paymentModel->where('id', $id)->where('users_id', Auth::id())->get();

        $priceTotal = 0;
        $contentTotal = 0;
        $adminTotal = 0;
        foreach($payments as $pay){
            foreach(json_decode($pay->order_details) as $details){
                $priceTotal += $details->price;
                $adminTotal += $details->tax;
                if($details->options->order_type == 2){
                    $priceTotal = $priceTotal - 75000;
                    $contentTotal += 75000;
                }
            }
        }

        return view('payment.invoice', compact('payments', 'priceTotal', 'adminTotal', 'contentTotal'));
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
        $request->validate([
            'payment_proof' =>  'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        $imageName = time().'_'.Str::random(10).'.'.$request->payment_proof->extension();

        $request->payment_proof->move(public_path('payment_proof'), $imageName);

        ImageOptimizer::optimize(public_path('payment_proof'. '/' .$imageName));

        Payment::where('id', $request->id)->update([
            'proof' =>  $imageName,
            'status'    =>  'Menunggu Persetujuan'
        ]);

        return back()->with('message', 'Bukti Berhasil Diupload!, Silahkan Hubungi Admin Untuk Konfirmasi.');
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
