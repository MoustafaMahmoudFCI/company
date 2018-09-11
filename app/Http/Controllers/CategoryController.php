<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use App\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy('created_at')->get();
        return view('admin.category.index' , compact('cats'));
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
        //dd($request->all());
        $this->validate($request , [
            "name"    => "required|array|min:2",
            "name.*"  => "required|string|distinct|min:3",
        ]);
        
        $cat = new Category();
        
        $cat->name = serialize($request->name);
        
        $cat->save();
        Session::flash('success' , 'Category Added Successfully');
        return redirect()->back();
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
        $cats = Category::orderBy('created_at')->get();
        $cat = Category::findOrFail($id);
        return view('admin.category.index')->with('cats' , $cats)->with('cat' , $cat);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
         Category::find($id)->delete();
         Session::flash('success' , 'Category has been reomved successfully');
         return redirect()->back();
    }
}
