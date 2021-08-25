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

        return view('publish.dashboard', compact('income', 'websites', 'orderCount', 'websiteCount'));

        // echo $websites;
    }

    public function orderList()
    {
        // Get Order list
        $websites = $this->websiteModel->getOrderList();

        return view('publish.order.order-list', compact('websites'));
    }

    public function orderShow($id)
    {
        $orders = Order::where('id', $id)->get();

        return view('publish.order.order-edit', compact('orders'));
    }

    public function orderUpdate(Request $request, $id)
    {
        Order::where('id', $id)->update([
            'result'        =>  $request->result,
            'order_status'  =>  'Selesai',
        ]);

        return redirect()->route('publish.user_order_list')->with('message', 'Order Berhasil Diupdate!, Silahkan Tunggu 1x24 Jam Hingga Saldo Masuk Ke Akun Anda.');
    }
}
