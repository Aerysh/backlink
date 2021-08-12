<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Website;
use App\Models\Payment;
use Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check If User Is Logged In Or Not

        if (Auth::check()){
            if(Cart::content()->isEmpty())
            {
                return redirect()->route('marketplace.index')->with('message_1', 'Keranjang Anda Kosong');
            }
            return view('marketplace.cart.index');
        }

        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $websites = Website::where('id', $id)->get();

        foreach($websites as $website);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($website){
            return $cartItem->id == $website->id;
        });

        if($duplicates->isNotEmpty())
        {
            return redirect()->route('cart.index')->with('message_1', 'Item Sudah Ada di Keranjang Anda');
        }

        Cart::add([
            'id'        => $website->id,
            'name'      => $website->url,
            'qty'       => 1,
            'price'     => $website->price,
            'options'   => [
                'details'           => '',
                'domain_authority'  => $website->domain_authority,
                'page_authority'    => $website->page_authority,
                'delivery_time'     => $website->delivery_time,
                ]
            ]);

        return redirect()->route('cart.index')->with('message_2', 'Item Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->route('cart.index')->with('message_3', 'Item Berhasil Dihapus');
    }
}
