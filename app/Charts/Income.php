<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Income extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // return Chartisan::build()
        //     ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
        //     ->dataset('Sample 1', [1, 2, 3])
        //     ->toJSON();

        $data = [];
        $data = $this->getIncome();

        return Chartisan::build()
        ->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->dataset('Pendapatan', $data);
    }

    public function getIncome()
    {
        $data = [];

        // Loop Through Months
        for($month = 1; $month <= 12; $month++)
        {
            $date = Carbon::create(date('Y'), $month);

            $date_end = $date->copy()->endOfMonth();

            $tax = 0;

            $query = Payment::where('status', 'Telah Dibayar')
            ->where('created_at', '>=', $date)
            ->where('created_at', '<=', $date_end)
            ->get();

            foreach($query as $q)
            {
                foreach(json_decode($q->order_details) as $detail)
                {
                    $tax += $detail->tax;
                }
            }

            array_push($data, $tax);
        }

        return $data;
    }
}
