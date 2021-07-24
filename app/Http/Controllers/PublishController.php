<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use Auth;
use Illuminate\Support\Facades\DB;

class PublishController extends Controller
{
    protected $websiteModel;

    public function __construct()
    {
        $this->websiteModel = new Website();
    }

    public function index()
    {
        // Get Order list
        $websites = $this->websiteModel->where('users_id', Auth::id())->get();

        // Get Order Count
        $orderCount = $this->websiteModel->getOrderCount();

        // Get Website Count
        $websiteCount = $this->websiteModel->getWebsiteCount();

        return view('publish.panel.dashboard', compact('websites', 'orderCount', 'websiteCount'));
    }
}
