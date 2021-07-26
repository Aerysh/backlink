<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Website;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    protected $websiteModel;
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
        $this->websiteModel = new Website();
    }

    // Publisher Order Page
    public function publisherOrderList()
    {
        $websites = Website::where('users_id', Auth::id())->get();
        return view('publish.panel.order-list', compact('websites'));
    }

    // Buyer Order Page
    public function buyerOrderList()
    {
        // Get Order List
        $orders = $this->orderModel->where('users_id', Auth::id())->get();


        return view('buyer.order', compact('orders'));
    }
}
