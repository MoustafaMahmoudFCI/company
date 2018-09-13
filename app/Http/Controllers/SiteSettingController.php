<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use Session;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('admin.siteSetting')->with('settings' , SiteSetting::all());
    }

    public function update(Request $request)
    {


    }
}
