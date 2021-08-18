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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if user have balance
        if(Auth::user()->balance >= 0){
            // Check if user balance >= total (amount * 0.05)
            $total = floatval( ( (int)$request->amount) - ( ((int)$request->amount) * 0.05 ) );
            if(Auth::user()->balance >= $total){

                // Store to database
                $this->withdrawModel->users_id          =   Auth::id();
                $this->withdrawModel->method            =   $request->method;
                $this->withdrawModel->receiver_number   =   $request->receiver_number;
                $this->withdrawModel->amount            =   $total;
                $this->withdrawModel->admin             =   (int)$request->amount * 0.05;
                $this->withdrawModel->status            =   'Pending';
                $this->withdrawModel->save();

                // Update user's balance
                User::where('id', Auth::id())->update([
                    'balance'   =>  Auth::user()->balance - $request->amount,
                ]);

                return back()->with('message', 'Pengajuan Penarikan Saldo Berhasil!, Silahkan Hubungi Admin Untuk Konfirmasi');
            }
        }

        return back()->with('message', 'Jumlah Penarikan Melebihi Saldo Anda!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
