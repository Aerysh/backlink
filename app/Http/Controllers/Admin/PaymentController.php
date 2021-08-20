<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('status', '=', 'waiting')->get();

        return view('admin.payment.payment-list', compact('payments'));
    }

    // Accept User's Pending Payment
    public function accept($id)
    {
        Payment::where('id', $id)->update([
            'status'    =>  'paid',
        ]);

        $payments = Payment::where('id', $id)->get();
        foreach($payments as $payment)
        {
            foreach(json_decode($payment->order_details) as $details);
            $order = Order::create([
                'order_number'  =>  strtoupper(Str::random(10)),
                'users_id'      =>  $payment->users_id,
                'order_type'    =>  $details->options->order_type,
                'price'         =>  $details->price,
                'order_status'  =>  'Menunggu Pengiriman',
                'details'       =>  $details->options->details,
                'result'        =>  ''
            ]);

            $order->website()->attach($details->id);
        }

        return back()->with('message', 'Pembayaran diterima!, order diteruskan kepada penjual.');
    }

    // Decline User's Pending Payment
    public function decline($id)
    {
        Payment::where('id', $id)->update([
            'status'    =>  'declined',
        ]);

        return back()->with('message', 'Pembayaran Ditolak!');
    }
}
