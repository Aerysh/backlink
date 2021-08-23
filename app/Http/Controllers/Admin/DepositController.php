<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    // Admin Rate Percentage
    // example:
    // no rate = 0
    // 5% rate = 0.05
    protected $adminRate = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::where('status', '=', 'Menunggu Persetujuan')
                    ->join('users', 'users.id', '=', 'deposit.users_id')
                    ->select('deposit.*', 'users.*', 'users.id as uid', 'deposit.id as did')
                    ->get();

        return view('admin.deposit.deposit-list', compact('deposits'));
    }

    // Accept user's pending deposit
    public function accept($id)
    {
        // Get Total Amount of Deposit
        $amount = Deposit::where('id', $id)->select('amount')->get();
        foreach($amount as $amt);
        $amount = $this->calculateBeforeTax($amt->amount);

        // Get User's ID from deposit table
        $users_id = Deposit::where('id', $id)->select('users_id')->get();
        foreach($users_id as $uid){
            // Get Current User's Balance with user id = deposit users_id
            $current = User::where('id', $uid->users_id)->select('balance')->get();
            foreach($current as $curr){
                $current = $curr->balance;

                // update the user's balance + deposit amount
                User::where('id', $uid->users_id)->update([
                    'balance'   =>  $current + $amount,
                ]);
            }

        }

        // Update Deposit Status
        Deposit::where('id', $id)->update([
            'status'    =>  'Telah Dibayar',
        ]);

        return back()->with('message', 'Pembayaran Diterima!, Saldo user akan diperbarui');

    }

    // decline deposit request
    public function decline($id)
    {
        Deposit::where('id', $id)->update([
            'status'    =>  'Ditolak'
        ]);

        return back()->with('message', 'Pembayaran Ditolak, Informasi akan diteruskan ke user');
    }

    // return deposit value before admin rate is added
    public function calculateBeforeTax($price)
    {
        return (100/(100 + $this->adminRate) * $price);
    }
}
