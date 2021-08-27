<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Deposit;
use Auth;
use Illuminate\Support\Str;
use ImageOptimizer;


class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::where('users_id', Auth::id())->get();
        return view('buyer.deposit.deposit', compact('deposits'));
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
        $deposit = Deposit::create([
            'users_id'      =>  Auth::id(),
            'amount'        =>  $request->sub,
            'proof'         =>  '',
            'status'        =>  'Menunggu Pembayaran'
        ]);

        $lastId = $deposit->id;
        return redirect()->route('buyer.user_deposit_show', ['id' => $lastId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deposits = Deposit::where('id', $id)->where('users_id', Auth::id())->get();

        return view('buyer.deposit.deposit-invoice', compact('deposits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'image'  =>  'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        $imageName = time().'_'.Str::random(10).'.'.$request->image->extension();

        $request->image->move(public_path('deposit_proof'), $imageName);
        ImageOptimizer::optimize(public_path('deposit_proof'. '/' .$imageName));

        Deposit::where('id', $request->id)->update([
            'proof' =>  $imageName,
            'status'    =>  'Menunggu Persetujuan'
        ]);

        return back()->with('message', 'Bukti Deposit Berhasil Diupload!, Silahkan Hubungi Admin Untuk Konfirmasi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
