<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Website;
use App\Models\User;
use Carbon\Carbon;

class UpdatePublisherBalance extends Command
{

    protected $websiteModel;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatePublisherBalance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Publisher Balance Based On All Finished Orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->websiteModel = new Website;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $websites = $this->websiteModel
                        ->join('order_website', 'order_website.website_id', '=', 'website.id')
                        ->join('orders', 'orders.id', '=', 'order_website.order_id')
                        ->select('website.users_id as id', 'orders.price as price', 'orders.updated_at')
                        ->where('orders.order_status', 'Selesai')
                        ->where('orders.updated_at', '>=', Carbon::now()->subDay())
                        ->get();

        foreach($websites as $website)
        {
            // Get The User Balance
            $balance = User::where('id', $website->id)->select('balance')->first();

            // Update User Balance
                User::where('id', $website->id)->update([
                    'balance'   => $balance->balance + $website->price,
                ]);
        }

        $this->info('Saldo Semua Penjual Berhasil Diperbarui');
    }
}
