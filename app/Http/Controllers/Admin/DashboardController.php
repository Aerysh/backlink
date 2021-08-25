<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentCount = Payment::where('status', '=', 'Menunggu Persetujuan')->count();
        $depositCount = Deposit::where('status', '=', 'Menunggu Persetujuan')->count();
        $withdrawCount = Withdraw::where('status', '=', 'Pending')->count();
        $websiteCount = Website::where('status', '=', 'Waiting')->count();

        return view('admin.index', compact('paymentCount', 'depositCount', 'withdrawCount', 'websiteCount'));
    }
}
