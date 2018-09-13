@extends('admin.layouts.app')

@section('title' , 'Sliders')

@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> slider </h4>
            <!--  to add new service -->
              <a href="{{ url('admin/slider/create') }}">Add New Slider</a>
          </div>
          <div class="card-body">
              @if (count($sliders) > 0)
            <div class="table-responsive">
              <table class="table table-sm">
                <thead class="">
                  <th>  #ID   </th>
                  <th> Image </th>
                  <th> Back Image </th>
                  <th>  Title English  </th>
                  <th>  Title Arabic  </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </thead>
                <tbody>
                  @foreach ($sliders as $slider)
                      <tr>
                          <td>
                              {{  $slider['id'] }}
                          </td>
                          <td>
                            <img class="img-fluid" width="40px" height="40px" src="{{ asset($slider->image) }}" alt="">
                        </td>
                        <td>
                            <img class="img-fluid" width="40px" height="40px" src="{{ asset($slider->back_image) }}" alt="">
                        </td>
                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                            <td dir="rtl">
                                {!! str_limit(unserialize($slider['title'])[ $key ] , 30) !!}
                            </td>
                        @endforeach

                          <td>
                              <a href="{{ route('slider.edit' , ['id' => $slider->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                          </td>
                          <td>
                              {!! Form::open(['route' => ['slider.destroy' ,  $slider->id] , 'method' => 'DELETE']) !!}

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>

                              {!! Form::close() !!}

                          </td>
                      </tr>

                  @endforeach
                </tbody>
              </table>
              {{ $sliders->links() }}
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

