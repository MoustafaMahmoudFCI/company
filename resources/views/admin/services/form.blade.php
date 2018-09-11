

<div class="form-group">
    <label for="icon" class="col-form-label">Icon </label>
    <input type="text"  name="icon" id="icon" class="form-control">
</div>
<div class="form-group row">
    @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
   <div class="form-group col-sm-6">
        <label for="name" class="col-form-label">Name </label>       
        <input type="text" name="name[{{ $key }}]" id="name" class=" form-control" placeholder="Enter Title in {{ $value['native'] }}">
   </div>
    @endforeach
</div>
<div class="form-group row">
    @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
    <div class="form-group col-sm-6">
        <label for="desc" class="col-form-label">Description </label>       
        <textarea name="desc[{{ $key }}]" id="desc" cols="30" rows="10" class="form-control" placeholder="Enter content in {{ $value['native'] }}"></textarea>
    </div>
    @endforeach
</div>

<div class="form-group text-center">
        <input type="submit" value="Add Service" class="btn btn-info">
</div>


{!! Form::close() !!}

