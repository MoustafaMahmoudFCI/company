@extends('admin.layouts.app')

@section('title' , 'Services')

@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Services </h4>
            <!--  to add new service -->
              <a href="{{ url('admin/service/create') }}">Add New Service</a>
          </div>
          <div class="card-body">
              @if (count($services) > 0)
            <div class="table-responsive">
              <table class="table table-sm">
                <thead class="">
                  <th>  #ID   </th>
                  <th>  Icon  </th>
                  <th>  Name English  </th>
                  <th>  Name Arabic  </th>
                  <th>  Desc English  </th>
                  <th>  Desc Arabic  </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </thead>
                <tbody>
                  @foreach ($services as $ser)
                      <tr>
                          <td>
                              {{  $ser['id'] }}
                          </td>
                          <td>
                            <i class="{{ $ser['icon'] }}"></i>
                        </td>
                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                            <td>
                                {!! unserialize($ser['title'])[ $key ] !!}
                            </td>
                        @endforeach
                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                            <td>
                                {!! str_limit( unserialize($ser['desc'])[ $key ] , 20 ) !!}
                            </td>
                        @endforeach
                          <td>
                              <a href="{{ route('service.edit' , ['id' => $ser->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            
                          </td>
                          <td>
                              {!! Form::open(['route' => ['service.destroy' ,  $ser->id] , 'method' => 'DELETE']) !!}

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                              
                              {!! Form::close() !!}
                            
                          </td>
                      </tr>
                      
                  @endforeach
                </tbody>
              </table>
              {{ $services->links() }}
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