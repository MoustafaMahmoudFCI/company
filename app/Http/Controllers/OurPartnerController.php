<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OurPartner;

class OurPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = OurPartner::all();
        return view('admin.partner.index' , compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $partners = OurPartner::all();
        // return view('admin.partner.create' , compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required' ,
            'logo' => 'required|image|mimes:png,jpg,jprg,gif' ,
            'link' => 'required|url' ,
        ]);

        $logo = '';
        if($request->hasFile('logo')){
            $logo = UploadImage($request->logo , 'uploads/partner');
        }

        OurPartner::create([
            'name' => $request->name ,
            'logo' => $logo ,
            'link' => $request->link ,
        ]);

        return redirect()->route('partner.index')->with('success' , 'Partner created successfukky');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = OurPartner::find($id);
        return view('admin.partner.edit' , compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'name' => 'required' ,
            'logo' => 'required|image|mimes:png,jpg,jprg,gif' ,
            'link' => 'required|url' ,
        ]);

        $logo = '';
        if($request->hasFile('logo')){
            $logo = UploadImage($request->image , 'uploads/partner');
        }

        OurPartner::fill(array_except($request->all()))->save();

        return redirect()->route('partner.index')->with('success' , 'Partner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OurPartner::find($id)->delete();
        return redirect()->back()->with('success' , 'Partner Removed successfully');
    }
}
