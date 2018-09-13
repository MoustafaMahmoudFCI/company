<div class="form-group ">

    {!! Form::label('name', 'Name', ['class' => 'col-form-label']) !!}

    {!! Form::text('name', null, ['class' => "form-control" , 'autofocus']) !!}

        @if ($errors->has('name'))
            <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

</div>

<div class="form-group ">

    {!! Form::label('email', 'E-Mail Address', ['class' => 'col-form-label']) !!}

    {!! Form::email('email', null, ['class' => 'form-control']) !!}

        @if ($errors->has('email'))
            <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

</div>

<div class="form-group ">

    {!! Form::label('role', 'Role', ['class' => 'col-form-label']) !!}

     {!! Form::select('role', role() , null , ['class' => 'custom-select form-control']) !!}

        @if ($errors->has('role'))
            <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif

</div>

<div class="form-group">

    {!! Form::label('avatar', 'Avatar', ['class' => 'col-form-label']) !!}

    {!! Form::file('avatar', ['class' => 'btn btn-info form-control']) !!}

        @if ($errors->has('avatar'))
            <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $errors->first('avatar') }}</strong>
            </span>
        @endif

</div>

<div class="form-group ">

    {!! Form::label('password', 'Password', ['class' => 'col-form-label']) !!}

    {!! Form::password('password', ['class' => 'form-control']) !!}

        @if ($errors->has('password'))
            <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

</div>

<div class="form-group ">
        {!! Form::label('password-confirm', 'password-confirm', ['class' => 'col-form-label']) !!}

        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}


</div>
