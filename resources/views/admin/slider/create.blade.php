@extends('admin.layouts.app')
@section('title' , 'Add New Slider')

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
                        {!! Form::open(['url' => 'admin/slider' , 'files' => 'true']) !!}

                            <div class="form-group row">
                                @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
                                    <div class="form-group col-sm-6">
                                        <label for="title" class="col-form-label">Title </label>
                                        <input type="text" name="title[{{ $key }}]"  value="{{ old('title')[$key] }}" id="title" class=" form-control" placeholder="Enter Title in {{ $value['native'] }}">
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-form-label">Slider Image </label>
                                <input style="opacity:1 ; position:relative" type="file" name="image" id="image" value="{{ old('image') }}" class="btn btn-info" >
                            </div>

                            <div class="form-group">
                                <label for="back_image" class="col-form-label">Back Image </label>
                                <input style="opacity:1; position:relative" type="file" name="back_image" id="back_image" value="{{ old('back_image') }}"  class="btn btn-info" >
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-form-label">Link </label>
                                <input type="url" name="link" id="link"  class="form-control" value="{{ old('link')  }}" >
                            </div>



                            <div class="form-group row">
                                @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
                                    <div class="form-group col-sm-6">
                                        <label for="desc" class="col-form-label">Description </label>
                                        <textarea name="desc[{{ $key }}]" id="desc" cols="30" rows="15" class="form-control" placeholder="Enter content in {{ $value['native'] }}">{{ old('desc')[$key] }}</textarea>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group text-center">
                                    <input type="submit" value="Add Slider" class="btn btn-info">
                            </div>


                            {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
