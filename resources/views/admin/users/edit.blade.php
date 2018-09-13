@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Edit {{ $user->name }}</h4>
                </div>

                <div class="card-body">

                    {!! Form::model($user , ['route' =>['users.update'  , 'id' => $user->id] ,'files' => 'true' , 'method' => 'PUT']) !!}


                        @include('admin.users.form')

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
@endsection
