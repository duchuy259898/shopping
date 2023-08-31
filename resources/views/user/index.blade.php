@extends('admin.master')

@section('title','Quản lý tài khoản')

@section('content')
<a href="{{route('user.create')}}" class="btn btn-primary">Add</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($data as $row)
    <tr>
      <th scope="row">{{$row->id}}</th>
      <td>{{$row->name}}</td>
      <td>{{$row->email}}</td>
      <td>
        <a class="btn btn-primary btn-xs" href="{{ route('user.edit',['user' => $row->id])}}">Edit</a>
        <form action="{{ route('user.destroy',['user' => $row->id])}}" method="POST">
          @csrf
          @method('DELETE') 
          <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('本当に削除していいの？')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<nav aria-label="Page navigation example">  
  <ul class="pagination">
    <li class="page-item {{ $data->currentPage() == 1 ? 'disabled' : '' }}">
      <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    @for ($i = 1; $i <= $data->lastPage(); $i++)
        <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}">
            <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="page-item {{ $data->currentPage() == $data->lastPage() ? 'disabled' : '' }}">
      <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
@stop