<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Website extends Model
{
    use HasFactory;

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

    // This Function Get User's Order Count
    public function getOrderCount()
    {
        return $this->where('users_id', Auth::id())
                    ->join('order_website', 'order_website.website_id', '=', 'website.id')
                    ->count();
    }

    public function getOrderList()
    {
        return $this->where('users_id', Auth::id())
                    ->has('Order')
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
        return $this->latest()
                    ->get();
    }

    // This Function Get Cheapest Item
    public function getCheapest()
    {
        return $this->orderBy('price', 'asc')
                    ->get();
    }

}
