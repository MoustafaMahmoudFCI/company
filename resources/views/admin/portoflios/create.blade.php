@extends('admin.layouts.app')
@section('title' , 'Add New Portoflio')

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
                        <h4 class="card-title"> Portoflio </h4>
                        {!! Form::open(['url' => 'admin/portoflio' , 'files' => 'true']) !!}

                            <div class="form-group row">
                                @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
                                    <div class="form-group col-sm-6">
                                        <label for="title" class="col-form-label">Title </label>
                                        <input type="text" name="title[{{ $key }}]" id="title" class=" form-control" placeholder="Enter Title in {{ $value['native'] }}">
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-form-label">Image </label>
                                <input style="opacity:1" type="file" name="image" id="image"  class="btn btn-info" >
                            </div>

                            <div class="form-group">
                                <label for="cat" class="col-form-label">Category</label>
                                <select name="cat_id" id="cat" class="form-control">
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}"> {{ unserialize($cat->name)['en']  . ' - ' . unserialize($cat->name)['ar'] }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
                                    <div class="form-group col-sm-6">
                                        <label for="desc" class="col-form-label">Description </label>
                                        <textarea name="desc[{{ $key }}]" id="desc" cols="30" rows="15" class="form-control" placeholder="Enter content in {{ $value['native'] }}"></textarea>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group text-center">
                                    <input type="submit" value="Add Portoflio" class="btn btn-info">
                            </div>


                            {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
