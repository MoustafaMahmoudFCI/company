@extends('admin.layouts.app')
@section('title' , 'Testimonials')
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
              <h4 class="card-title"> Testimonials </h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTest">
                    Add New Testimonial
                </button>
            </div>
            <div class="card-body">
                @if (count($tests) > 0)
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
                    @foreach ($tests as $test)
                        <tr>
                            <td>
                                {{  $test['id'] }}
                            </td>
                            <td>
                                {{ $test['name'] }}
                            </td>
                            <td>
                                <img src="{{ asset($test->logo) }}" width="40px" height="40px" alt="">
                            </td>

                            <td>
                                <a href="{{ route('testimonial.edit' , ['id' => $test->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                            </td>
                            <td>
                                {!! Form::open(['route' => ['testimonial.destroy' ,  $test->id] , 'method' => 'DELETE']) !!}

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
                    <span>There is no Testimonials </span>
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="addTest" tabindex="-1" role="dialog" aria-labelledby="addTest" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTest">Add Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route' => ['testimonial.store' ] , 'files' => 'true']) !!}
      <div class="modal-body">

            <div class="form-group">

                {!! Form::label('desc', 'Body', ['class' => 'col-form-label']) !!}


                {!! Form::textarea('desc', null , ['class' => 'form-control']) !!}


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
