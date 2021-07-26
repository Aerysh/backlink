<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\DB;

class PublishController extends Controller
{
    protected $websiteModel;
    protected $orderModel;

    public function __construct()
    {
        $this->websiteModel = new Website();
        $this->orderModel = new Order();
    }

    public function dashboard()
    {
        // Get Total Income
        $income = $this->websiteModel->getUserIncome();

        // Get Order list
        $websites = $this->websiteModel->getOrderList();

        // Get Order Count
        $orderCount = $this->websiteModel->getOrderCount();

        // Get Website Count
        $websiteCount = $this->websiteModel->getWebsiteCount();

        return view('publish.panel.dashboard', compact('income', 'websites', 'orderCount', 'websiteCount'));

        // echo $websites;
    }

    public function orderList()
    {
        // Get Order list
        $websites = $this->websiteModel->getOrderList();

        return view('publish.panel.order-list', compact('websites'));
    }
}
