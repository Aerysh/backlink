<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\WebsiteRequest;

class WebsiteController extends Controller
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
        $websites = $this->websiteModel->getWebsiteList();

        return view('publish.website.website-list', compact('websites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('publish.website.add-website', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteRequest $request)
    {
        $validated = $request->validated();


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
        $website->category()->attach($request->categories_id);

        return redirect()->route('publish.user_website_list')->with('add-website-success', 'Pendaftaran Website Berhasil !, Silahkan Tunggu Aprroval Admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $websites = $this->websiteModel->getWebsiteById($id);

        return view('info.website-details', compact('websites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $websites = $this->websiteModel->edit($id);
        $categories = Category::all();

        return view('publish.website.edit-website', compact('websites', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($this->websiteModel->checkWebsiteOrder($request->id))
        {
            return back()->with('order-exist', 'Maaf Anda Sedang Memiliki Pesanan, Silahkan Diselesaikan Terlebih Dahulu');
        }else{
            $update = $this->websiteModel->where('id', $request->id)->update([
                'description'   =>  $request->description,
                'price'             =>  $request->price,
                'delivery_time'     =>  $request->delivery_time
            ]);

            $updateCategory = Website::find($request->id);
            $updateCategory->category()->detach();
            $updateCategory->category()->attach($request->categories_id);

            return back()->with('message', 'Website Berhasil Diperbarui !');
        }
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
