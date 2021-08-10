<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class BuyerController extends Controller
{

    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    // Display Buyer's Dashboard
    public function dashboard()
    {
        // Get Total Order
        $orderCount = $this->orderModel->getOrderCount();

        // Get Finished Order Count
        $finishedOrder = $this->orderModel->getFinishedOrderCount();

        // Get Active Order Count
        $activeOrder = $this->orderModel->getActiveOrderCount();

        // Get Order List
        $orders = $this->orderModel->getOrderList();

        return view('buyer.dashboard', compact('orderCount', 'finishedOrder', 'activeOrder', 'orders'));
    }

    // Display Buyer's Order List
    public function orderList()
    {
        $orders = $this->orderModel->getOrderList();

        return view('buyer.order.order-list', compact('orders'));
    }

    // Display Order Details
    public function orderDetails($id)
    {
        $orders = Order::where('id', $id)->where('users_id', Auth::id())->get();

        return view('buyer.order.order-details', compact('orders'));
    }
}
