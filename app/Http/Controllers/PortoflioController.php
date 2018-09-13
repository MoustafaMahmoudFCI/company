<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Portoflio;
use App\Http\Requests;

class PortoflioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portoflio = Portoflio::orderBy('created_at' , 'desc')->paginate(5);
        return view('admin.portoflios.index' , compact('portoflio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.portoflios.create' , compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PortoflioRequest $request)
    {
       
        $image = '';
        if($request->hasFile('image')){
            $image = UploadImage($request->image  , 'uploads/portoflio');
        }

        Portoflio::create([
            'title' => serialize($request->title) , 
            'image' => $image ,
            'desc' => serialize($request->desc) ,
            'cat_id' => $request->cat_id ,
        ]);

        return redirect()->back()->with('success' , 'Portoflio created successfully');
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
        $portoflio = Portoflio::find($id);
        $cats = Category::all();
        return view('admin.portoflios.edit' , compact(['portoflio' , 'cats']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PortoflioRequest $request, $id)
    {
        $port = Portoflio::find($id);

       // $port->fill(array_except($request->all() , ['image']))->save();
       $port->title = serialize($request->title);
       $port->desc = serialize($request->desc);
       $port->cat_id = $request->cat_id;
       $port->save();

        if($request->hasFile('image')){
            $image = UploadImage($request->image , 'uploads/portoflio');
            $port->fill(['image' => $image ])->save();
        }

        return redirect()->back()->with('success' , 'Portoflio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portoflio::find($id)->delete();
        return redirect()->back()->with('success' , 'Portoflio Removed Successfully');
    }
}
