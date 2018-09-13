@extends('admin.layouts.app')
@section('title' , 'Partners')
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
              <h4 class="card-title"> Partners </h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPartner">
                    Add New Partner
                </button>
            </div>
            <div class="card-body">
                @if (count($partners) > 0)
              <div class="table-responsive">
                <table class="table table-sm table-dark">
                  <thead class=" text-primary">
                    <th>  #ID   </th>
                    <th>  Name  </th>
                    <th> Logo </th>
                    <th> Edit </th>
                    <th> Delete </th>
                  </thead>
                  <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td>
                                {{  $partner['id'] }}
                            </td>
                            <td>
                                {{ $partner['name'] }}
                            </td>
                            <td>
                                <img src="{{ asset($partner->logo) }}" width="70px" height="40px" alt="">
                            </td>

                            <td>
                                <a href="{{ route('partner.edit' , ['id' => $partner->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['partner.destroy' ,  $partner->id] , 'method' => 'DELETE']) !!}

                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>

                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
                @else
                <div class="alert alert-warning">
                    <span>There is no Partners </span>
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="addPartner" tabindex="-1" role="dialog" aria-labelledby="addPartnerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPartnerLabel">Add Partner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route' => ['partner.store' ] , 'files' => 'true']) !!}
      <div class="modal-body">

            <div class="form-group">

                {!! Form::label('name', 'Partner Name', ['class' => 'col-form-label']) !!}

                {!! Form::text('name', null, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('link', 'Partner Link', ['class' => 'col-form-label']) !!}


                {!! Form::url('link', null , ['class' => 'form-control']) !!}


            </div>

            <div class="form-group">

                {!! Form::label('logo', 'Logo', ['class' => 'col-form-label']) !!}

                {!! Form::file('logo', ['class' => 'form-control']) !!}

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
