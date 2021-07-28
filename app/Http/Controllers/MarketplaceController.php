<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\Category;

class MarketplaceController extends Controller
{
    protected $websiteModel;

    public function __construct()
    {
        $this->websiteModel = new Website();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Top Selling

        // Newest
        $latest = $this->websiteModel->getLatest();

        // Cheapest
        $cheapest = $this->websiteModel->getCheapest();

        // Category
        $categories = Category::all();

        return view('marketplace.index', compact('latest', 'cheapest', 'categories'));
    }

    // Return search result
    public function search(Request $request)
    {
        $categories = Category::all();

        $results = $this->websiteModel->search($request->categories, $request->domain_authority, $request->page_authority);

        return view('marketplace.search-result', compact('categories', 'results'));
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
    public function store(Request $request)
    {
        //
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
