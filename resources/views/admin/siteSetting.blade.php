@extends('admin.layouts.app')
@section('title' , 'Edit Slider')

@section('content')

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger"> {{$error}} </div>
        @endforeach
    @endif
        <div class="row justify-content-center">
            <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Edit Site Setting</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['setting.update'] ,'method' => 'PUT' , 'files' => 'true']) !!}
                            @foreach ($settings as $setting)
                                <div class="form-group">

                                    {!! Form::label($setting->name, $setting->slug , ['class' => 'col-form-label']) !!}

                                    @if ($setting->type == 'url')
                                        {!! Form::url($setting->name, $setting->en_content, ['class' => 'form-control']) !!}
                                    @elseif($setting->type == 'file')
                                        {!! Form::file($setting->name, ['class' => 'form-control']) !!}
                                    @elseif($setting->type == 'text')

                                    {!! Form::text($setting->name, $setting->en_content, ['class' => 'form-control']) !!}

                                    @elseif($setting->type == 'textarea')
                                       <div class="form-group row">

                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="en_content" id="en_content" cols="30" rows="10">
                                                    {{ $setting->en_content }}
                                                </textarea>
                                            </div>
                                            <div class="col-sm-6">
                                                    <textarea class="form-control" name="ar_content" id="ar_content" cols="30" rows="10">
                                                        {{ $setting->ar_content }}
                                                    </textarea>
                                                </div>
                                       </div>
                                    @endif
                                </div>
                            @endforeach

                            <div class="form-group  mb-0 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
