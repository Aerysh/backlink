<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::where('status', '=', 'Menunggu Persetujuan')->join('users', 'deposit.users_id', '=', 'users.id')->get();

        return view('admin.deposit.deposit-list', compact('deposits'));
    }

    // Accept user's pending deposit
    public function accept($id)
    {
        // Update Pending Deposit Status
        Deposit::where('id', $id)->update([
            'status'    =>  'Telah Dibayar',
        ]);

        // Get Total Amount of Deposit - 1000
        $amount = Deposit::where('id', $id)->select('amount')->get();
        foreach($amount as $amt);
        $amount = $amt->amount - 1000;
        echo $amount;

        // Get User's ID
        $users_id = Deposit::where('id', $id)->select('users_id')->get();
        foreach($users_id as $uid){
            // Get Current User's Balance
            $current = User::where('id', $uid->users_id)->select('balance')->get();
            foreach($current as $curr){
                $current = $curr->balance;

                // Get User's ID then update the user's balance + deposit amount
                User::where('id', $uid->users_id)->update([
                    'balance'   =>  $current + $amount,
                ]);
            }

        }
        return back()->with('message', 'Pembayaran Diterima!, Saldo user akan diperbarui');

    }

    public function decline($id)
    {
        Deposit::where('id', $id)->update([
            'status'    =>  'Ditolak'
        ]);

        return back()->with('message', 'Pembayaran Ditolak, Informasi akan diteruskan ke user');
    }
}
