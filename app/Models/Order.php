<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable =   [
        'order_number',
        'users_id',
        'order_type',
        'order_status',
        'price',
        'details',
        'result',
    ];

    public function website()
    {
        return $this->belongsToMany(Website::class);
    }

    public function getOrderList()
    {
        return $this->where('users_id', Auth::id())
                    ->get();
    }

    public function getOrderDetails($orderNumber)
    {
        return $this->where('order_number', $orderNumber)
                    ->get();
    }

    public function getOrderCount()
    {
        return $this->where('users_id', Auth::id())
                    ->count();
    }

    public function getFinishedOrderCount()
    {
        return $this->where('users_id', Auth::id())
                    ->where('order_status', '=', 'Selesai')
                    ->count();
    }

    public function getActiveOrderCount()
    {
        return $this->where('users_id', Auth::id())
                    ->where('order_status', '=', 'Sedang Dikerjakan')
                    ->count();
    }
}
