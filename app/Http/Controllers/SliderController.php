<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Slider;
use App\Http\Requests;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::OrderBy('created_at' , 'DESC')->paginate(5);
        return view('admin.slider.index' , compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SliderRequest $request)
    {
        $image = '';
        $back_image = '';
        if($request->hasFile('image') && $request->hasFile('back_image')){
            $image = UploadImage($request->image , 'uploads/slider');
            $back_image = UploadImage($request->back_image , 'uploads/slider');
        } else {
            $this->validate($request, [
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'back_image' => 'required|image|mimes:png,jpg,jpeg,gif',
            ]);
        }

        Slider::create([
            'title' => serialize($request->title) ,
            'image' => $image ,
            'back_image' => $back_image ,
            'desc' => serialize($request->desc) ,
            'link' => $request->link ,
        ]);

        Session::flash('success' , 'Slider Added Successfully');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit' , compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SliderRequest $request, $id)
    {
        $slider = Slider::find($id);


        $slider->title = serialize($request->title);
        $slider->desc = serialize($request->desc);
        $slider->link = $request->link;
        $slider->save();


        if($request->hasFile('image')){
            $image = UploadImage($request->image , 'uploads/slider');
            $slider->image = $image;
            $slider->save();
        }


        if($request->hasFile('back_image')){
            $back_image = UploadImage($request->back_image , 'uploads/slider');
            $slider->back_image = $back_image;
            $slider->save();
        }

        return redirect()->route('slider.index')->with('success' , 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        return redirect()->back()->with('success' , 'Sliser Reomved successfully');
    }
}
