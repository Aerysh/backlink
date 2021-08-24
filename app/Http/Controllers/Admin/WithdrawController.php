<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use App\Models\User;
use Illuminate\Http\Request;

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
        $withdraws =    $this->withdrawModel->where('status', 'Waiting')->get();
        return view('admin.withdraw.withdraw-list', compact('withdraws'));
    }

    /**
     * Accept User Withdraw Request
     *
     *
     */

    public function accept($id)
    {
        $this->withdrawModel->where('id', $id)->update([
            'status'    =>  'Completed',
        ]);

        return back()->with('message', 'Request Withdrawal Disetujui.');
    }

    public function decline($id)
    {
        // Update Withdraw status to declined
        $this->withdrawModel->where('id', $id)->update([
            'status'    =>  'Declined',
        ]);

        return back()->with('message', 'Request Withdrawal Ditolak.');
    }
}
