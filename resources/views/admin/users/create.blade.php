@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">{{ __('Register') }}</h4>
                </div>

                <div class="card-body">

                    {!! Form::open(['route' =>['users.store' ] ,'files' => 'true']) !!}


                        @include('admin.users.form')

                        <div class="form-group  mb-0 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
