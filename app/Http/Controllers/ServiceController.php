<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Session;
use App\Http\Requests;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at' , 'DESC')->paginate(6);
        return view('admin.services.index' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ServiceRequest $request)
    {
        //dd($request->all());
        $ser = new Service();
        $ser->icon = $request->icon ;
        $ser->title = serialize($request->name);
        $ser->desc = serialize($request->desc);
        $ser->save();
        Session::flash('success' , 'Service add successfully');
        return redirect()->route('service.index');
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
        $service = Service::findOrFail($id);
        return view('admin.services.edit' , compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ServiceRequest $request, $id)
    {
        //dd($request->all());
      //  $bu = Bu::find($id);
        $ser = Service::find($id);
        $ser->icon = $request->icon;
        $ser->title = serialize($request->name);
        $ser->desc = serialize($request->desc);
        $ser->save();
        Session::flash('success' , 'Service Updated successfully');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        return redirect()->back()->with('success' , 'Service Removed Successfully');
    }
}
