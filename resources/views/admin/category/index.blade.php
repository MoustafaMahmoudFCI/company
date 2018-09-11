@extends('admin.layouts.app')
@section('title' , 'Categories')
@section('content')
   
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Categories </h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
                    Add New Category
                </button>
            </div>
            <div class="card-body">
                @if (count($cats) > 0)
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead class=" text-primary">
                    <th>  #ID   </th>
                    <th>  Name  </th>
                    <th>  الاسم  </th>
                    <th> Created_at </th>
                    <th> Edit </th>
                    <th> Delete </th>
                  </thead>
                  <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <td>
                                {{  $cat['id'] }}
                            </td>
                            <td>
                                {!! unserialize($cat['name'])['en'] !!}
                            </td>
                            <td>
                              {!! unserialize($cat['name'])['ar'] !!}
                            </td>
                            <td>
                                {{ $cat['created_at']->diffForHumans() }}
                            </td>
                            <td>
                                <a href="{{ route('category.edit' , ['id' => $cat->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                              
                            </td>
                            <td>
                                {!! Form::open(['route' => ['category.destroy' ,  $cat->id] , 'method' => 'DELETE']) !!}

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
                    <span>There is no categories </span>
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['url' => 'admin/category']) !!}      
      <div class="modal-body">

            <div class="form-group">
                
              @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
               
                <label for="name" class="col-form-label">Category Name In {{ $value['native'] }}</label>
                
                <input type="text" name="name[{{ $key }}]" id="name" class="form-control" placeholder="Enter Category Name" required>
              @endforeach
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