@extends('admin.layouts.app')

@section('title' , 'Users')

@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Users </h4>
            <!--  to add new service -->
              <a href="{{ url('admin/users/create') }}">Add New User</a>
          </div>
          <div class="card-body">
              @if (count($users) > 0)
            <div class="table-responsive">
              <table class="table table-sm">
                <thead class="">
                  <th>  #ID   </th>
                  <th> Image </th>
                  <th> Name </th>
                  <th> E-mail </th>
                  <th> Role </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                      <tr>
                          <td>
                              {{  $user['id'] }}
                          </td>
                          <td>
                            <img class="img-fluid" width="40px" height="40px" src="{{ asset($user->avatar) }}" alt="">
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @if ($user->role)  <!-- role == 1 =>  user  / role == 0 => admin -->
                                <a href="{{ route('users.changeRole' , ['id' => $user->id]) }}"><span class="badge badge-warning">Make Admin</span></a>
                            @else
                                <a href="{{ route('users.changeRole' , ['id' => $user->id]) }}"><span class="badge badge-info">Make User</span></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit' , ['id' => $user->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                          <td>
                              {!! Form::open(['route' => ['users.destroy' ,  $user->id] , 'method' => 'DELETE']) !!}

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>

                              {!! Form::close() !!}

                          </td>
                      </tr>

                  @endforeach
                </tbody>
              </table>
              {{ $users->links() }}
            </div>
              @else
              <div class="alert alert-warning">
                  <span>There is no Users </span>
              </div>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

