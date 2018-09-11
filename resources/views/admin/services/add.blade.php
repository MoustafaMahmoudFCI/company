@extends('admin.layouts.app')
@section('title' , 'Add New Service')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Services </h4>   
                        {!! Form::open(['url' => 'admin/service']) !!}
                          @include('admin.services.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection