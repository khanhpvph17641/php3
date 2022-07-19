@extends('layout.master')
@section('title', 'Thêm mới User')
    
@section('content')
<form method="get" action="{{route('users')}}">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên </label>
        <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tuổi </label>
      <input type="name" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
    <button type="submit" class="btn btn-primary">submit</button>
  </form>
  @endsection