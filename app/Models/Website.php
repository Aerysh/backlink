<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Kirschbaum\PowerJoins\PowerJoins;

class Website extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $table = 'website';

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }

    // This Function Get All Website Owned By User
    public function getWebsiteList()
    {
        return $this->where('users_id', Auth::id())
                    ->get();
    }

    // This Function Return Website By ID
    public function getWebsiteById($id)
    {
        return $this->where('id', $id)
                    ->get();
    }

    // This Function Get User's Order Count
    public function getOrderCount()
    {
        return $this->where('users_id', Auth::id())
                    ->join('order_website', 'order_website.website_id', '=', 'website.id')
                    ->count();
    }

    public function getOrderList()
    {
        return $this->where('website.users_id', Auth::id())
                ->join('order_website', 'order_website.website_id', '=', 'website.id')
                ->join('orders', 'orders.id', '=', 'order_website.order_id')
                ->select('website.url as name', 'website.delivery_time', 'orders.*')
                ->get();
    }

    // This Function Get User's Website Count
    public function getWebsiteCount()
    {
        return $this->where('users_id', Auth::id())
                    ->count();
    }

    // This Funciton Get User's Total Income
    public function getUserIncome()
    {
        $income = 0;

        $websites = $this->where('users_id', Auth::id())->get();
        foreach($websites as $website)
        {
            foreach($website->order as $order)
            {
                if($order->status == 'Selesai')
                {
                    $income += $order->price;
                }
            }
        }

        return $income;
    }

    // This Function Get Top Selling Item
    public function getTopSelling()
    {

    }

    // This Function Get Newest Item
    public function getLatest()
    {
        return $this->where('status', 'Approved')
                    ->latest()
                    ->get();
    }

    // This Function Get Cheapest Item
    public function getCheapest()
    {
        return $this->where('status', 'Approved')
                    ->orderBy('price', 'asc')
                    ->get();
    }

    // This Function Return If a Website Have Order Or Not
    public function checkWebsiteOrder($id)
    {
        $website = $this->where('website.id', $id)
                        ->joinRelationship('order')
                        ->where('order_status', '=', 'Sedang Dikerjakan')
                        ->get();

        if($website->first()){
            return True;
        }

        return false;
    }

    // This function return website that match search criteria
    public function search($category, $da, $pa)
    {
        if($category == 'all')
        {
            return $this->where('domain_authority', '>=', (int) $da)
                    ->where('page_authority', '>=', (int) $pa)
                    ->orderBy('domain_authority', 'asc')
                    ->orderBy('page_authority', 'asc')
                    ->get();
        }else{
            return $this->where('domain_authority', '>=', (int) $da)
                        ->where('page_authority', '>=', (int) $pa)
                        ->joinRelationship('category')
                        ->where('categories.id', $category)
                        ->orderBy('domain_authority', 'asc')
                        ->orderBy('page_authority', 'asc')
                        ->get();
        }


    }

    // Return user's website details to edit
    public function edit($id)
    {
        $edit = $this->where('id', $id)->where('users_id', Auth::id())->get();

        if($edit->isEmpty())
        {
            abort(403, 'Unauthorized Action');
        }

        return $edit;
    }

}
