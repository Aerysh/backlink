<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\User;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::where('status', 'Waiting')->get();

        return view('admin.website.website-list', compact('websites'));
    }

    public function show($id)
    {

    }

    public function accept($id)
    {
        Website::where('id', $id)->update([
            'status'    =>  'Approved',
        ]);

        return back()->with('message', 'Request Website Diterima!');
    }

    public function decline($id)
    {
        Website::where('id', $id)->update([
            'status'    =>  'Declined',
        ]);

        return back()->with('message', 'Request Website Ditolak!');
    }
}
