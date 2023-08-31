@extends('admin.master')

@section('content')

<form action="{{route('user.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputPassword1"  placeholder="Name">
    @if($errors->has('name'))
      {{$errors->first('name')}}
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email">
    @if($errors->has('email'))
      {{$errors->first('email')}}
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" >
    @if($errors->has('password'))
      {{$errors->first('password')}}
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="text" class="form-control" name="confirm_password" id="exampleInputPassword1" placeholder="Confirm Password" >
    @if($errors->has('confirm_password'))
      {{$errors->first('confirm_password')}}
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop