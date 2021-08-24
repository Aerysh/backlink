<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\User;
use Auth;

class WithdrawController extends Controller
{
    protected $withdrawModel;




    public function __construct()
    {
        $this->withdrawModel = new Withdraw();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws = $this->withdrawModel->where('users_id', Auth::id())->get();

        return view('publish.withdraw.index', compact('withdraws'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check If current user have balance
        if(Auth::user()->balance > 0)
        {
            // Check if current user balance is sufficient
            if($request->total_amount <= Auth::user()->balance)
            {
                $this->withdrawModel->users_id          =   Auth::id();
                $this->withdrawModel->method            =   $request->method;
                $this->withdrawModel->receiver_name     =   $request->receiver_name;
                $this->withdrawModel->receiver_number   =   sprintf($request->receiver_number);
                $this->withdrawModel->amount            =   $request->total_amount;
                $this->withdrawModel->status            =   'Waiting';
                $this->withdrawModel->save();

                // Update user's balance
                User::where('id', Auth::id())->update([
                    'balance'   =>  Auth::user()->balance - $request->total_amount,
                ]);

                return back()->with('message', 'Pengajuan Penarikan Saldo Berhasil!, Silahkan Hubungi Admin Untuk Konfirmasi');
            }
        }

        echo Auth::user()->balance;
        return back()->with('message', 'Saldo Anda Tidak Mencukupi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Withdraw Amount
        $balance = $this->withdrawModel->where('id', $id)->select('amount')->get();
        foreach($balance as $bal);

        // Update User Balance
        User::where('id', Auth::id())->update([
            // Update Balance + Balance Before Admin Cut
            'balance'   =>  Auth::user()->balance + $this->getBalanceBeforeAdminCut($bal->amount),
        ]);

        // Delete Record
        $this->withdrawModel->where('id', $id)->delete();

        return back()->with('message', 'Pengajuan berhasil dibatalkan!');

    }

    /**
     * Admin Rate Cut
     *
     * @param int $price
     * Formula:
     * price * (100 / ( 100 - admin rate))
     */

    // Change This To Other Percentage
    // example :
    // $rate = 5 means 5% admin rate
    protected $rate = 0;

    public function getBalanceBeforeAdminCut($price)
    {
        // return ($price * 100)/$this->rate;
        return $price * (100/(100 - $this->rate));
    }
}
