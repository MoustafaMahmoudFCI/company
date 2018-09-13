@extends('admin.layouts.app')

@section('title' , 'Portoflios')

@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Portoflio </h4>
            <!--  to add new service -->
              <a href="{{ url('admin/portoflio/create') }}">Add New Portoflio</a>
          </div>
          <div class="card-body">
              @if (count($portoflio) > 0)
            <div class="table-responsive">
              <table class="table table-sm">
                <thead class="">
                  <th>  #ID   </th>
                  <th> Image </th>
                  <th>  Title English  </th>
                  <th>  Title Arabic  </th>
                  <th>  Desc English  </th>
                  <th>  Desc Arabic  </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </thead>
                <tbody>
                  @foreach ($portoflio as $por)
                      <tr>
                          <td>
                              {{  $por['id'] }}
                          </td>
                          <td>
                            <img class="img-fluid" width="60px" height="60px" src="{{ asset($por->image) }}" alt="">
                        </td>
                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                            <td>
                                {!! unserialize($por['title'])[ $key ] !!}
                            </td>
                        @endforeach
                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                            <td>
                                {!! str_limit( unserialize($por['desc'])[ $key ] , 20 ) !!}
                            </td>
                        @endforeach
                          <td>
                              <a href="{{ route('portoflio.edit' , ['id' => $por->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                          </td>
                          <td>
                              {!! Form::open(['route' => ['portoflio.destroy' ,  $por->id] , 'method' => 'DELETE']) !!}

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>

                              {!! Form::close() !!}

                          </td>
                      </tr>

                  @endforeach
                </tbody>
              </table>
              {{ $portoflio->links() }}
            </div>
              @else
              <div class="alert alert-warning">
                  <span>There is no Services </span>
              </div>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

