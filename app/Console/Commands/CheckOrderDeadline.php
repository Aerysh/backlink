<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Website;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;


class CheckOrderDeadline extends Command
{
    protected $websiteModel;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkOrderDeadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->websiteModel = new Website();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders =   $this->websiteModel
                        ->join('order_website', 'order_website.website_id', '=', 'website.id')
                        ->join('orders', 'orders.id', '=', 'order_website.order_id')
                        ->where('orders.order_status', 'Menunggu Pengiriman')
                        ->select('orders.id', 'orders.users_id', 'orders.price', 'website.delivery_time', 'orders.created_at')
                        ->get();

        foreach($orders as $order)
        {
            $orderDate = $order->created_at;
            $deadline = $orderDate->addDays($order->delivery_time);


            // Update Order to Canceled if order due deadline
            if(Carbon::now() >= $deadline)
            {
                Order::where('id', $order->id)->update([
                    'order_status'    =>      'Dibatalkan',
                ]);

                // Get Buyer Balance
                $balance = User::where('id', $order->users_id)->select('balance')->get();
                foreach($balance as $bal){
                    $balance = $bal->balance + $order->price;
                }

                // Return Payment To user Balance
                User::where('id', $order->users_id)->update([
                    'balance'   =>  $balance,
                ]);

                // Send Email To User
            }
        }

        $this->info('Order Berhasil Diperbarui');
    }
}
