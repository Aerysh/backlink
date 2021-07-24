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

    public function getOrderCount()
    {
        return $this->where('users_id', Auth::id())
                    ->join('order_website', 'order_website.website_id', '=', 'website.id')
                    ->count();
    }

    public function getWebsiteCount()
    {
        return $this->where('users_id', Auth::id())
                    ->count();
    }
}
