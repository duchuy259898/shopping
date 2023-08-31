@extends('admin.master')

@section('content')

<form action="{{route('category.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name">
    @if($errors->has('name'))
      {{$errors->first('name')}}
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Slug</label>
    <input type="text" class="form-control" name="slug" id="exampleInputPassword1" >
    @if($errors->has('slug'))
      {{$errors->first('slug')}}
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop