@extends('admin.master')

@section('content')
<form action="{{route('category.update',$model->id)}}" method="POST">
@method('PUT')
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" value="{{$model->name}}" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Slug</label>
    <input type="text" value="{{$model->slug}}" class="form-control" name="slug" id="exampleInputPassword1" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop