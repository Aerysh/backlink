<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    public function encode($data)
    {
        foreach ($data as $d)
        {
            $encoded = collect([
                'id'        =>  $d->id,
                'name'      =>  $d->name,
                'subtotal'  =>  $d->subtotal,
                'details'   =>  $d->options->details,

            ]);
        }

        return json_encode($encoded);
    }

    public function getPaymentList()
    {
        return $this->where('users_id', Auth::id())->get();
    }

    public function checkWaiting()
    {
        return $this->where('users_id', Auth::id())->where('status', '=', 'waiting')->count();
    }
}
