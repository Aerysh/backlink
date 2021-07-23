<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::where('users_id', Auth::id())->get();

        return view('publish.panel.website-list', compact('websites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('publish.panel.add-website', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $website = new Website();
        $website->users_id          = Auth::id();
        $website->url               = $request->url;
        $website->description       = $request->description;
        $website->domain_authority  = $request->domain_authority;
        $website->page_authority    = $request->page_authority;
        $website->price             = $request->price;
        $website->delivery_time     = $request->delivery_time;
        $website->status            = 'Waiting';
        $website->save();
        $website->category()->sync([$request->category]);

        return redirect()->route('publish.user_website_list')->with('add-website-success', 'Pendaftaran Website Berhasil !, Silahkan Tunggu Aprroval Admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
