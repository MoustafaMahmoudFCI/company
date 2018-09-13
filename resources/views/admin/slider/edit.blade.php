@extends('admin.layouts.app')
@section('title' , 'Edit Slider')

@section('content')

    <div class="content">
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger"> {{$error}} </div>
            @endforeach
          @endif
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                                <h4 class="card-title"> Slider </h4>
                                {!! Form::open(['route' => ['slider.update' , $slider->id ] , 'method' => 'PUT' , 'files' => 'true']) !!}

                                    <div class="form-group row">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
                                            <div class="form-group col-sm-6">
                                                <label for="title" class="col-form-label">Title </label>
                                                <input type="text" value="{{ unserialize($slider->title)[$key] }}" name="title[{{ $key }}]" id="title" class=" form-control" placeholder="Enter Title in {{ $value['native'] }}">
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label for="link" class="col-form-label">Link</label>
                                        <input type="url" name="link" id="link" value="{{ $slider->link }}" class="form-control">
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <label for="image" class="col-form-label">Image </label>
                                            <input style="opacity:1" type="file" name="image" id="image"  class="btn btn-info" >
                                        </div>
                                        <div class="form-group col-4">
                                            <img width="100px" height="100px" src="{{ asset($slider->image) }}" alt="{{ unserialize($slider->title)['en'] }}">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-8">
                                            <label for="back_image" class="col-form-label">Back Image </label>
                                            <input style="opacity:1" type="file" value="{{ $slider->back_image }}" name="back_image" id="back_image"  class="btn btn-info" >
                                        </div>
                                        <div class="form-group col-4">
                                            <img width="100px" height="100px" src="{{ asset($slider->back_image) }}" alt="{{ unserialize($slider->title)['en'] }}">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
                                            <div class="form-group col-sm-6">
                                                <label for="desc" class="col-form-label">Description </label>
                                                <textarea name="desc[{{ $key }}]" id="desc" cols="30" rows="15" class="form-control" placeholder="Enter content in {{ $value['native'] }}">
                                                    {{ unserialize($slider->desc)[$key] }}
                                                </textarea>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group text-center">
                                            <input type="submit" value="Save Changes" class="btn btn-info">
                                    </div>


                                    {!! Form::close() !!}


                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
