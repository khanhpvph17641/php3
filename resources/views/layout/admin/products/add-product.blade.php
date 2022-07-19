@extends('layout.master')
@section('title', 'Thêm mới sản phẩm')
    
@section('content')
<div><h1>Thêm mới sản phẩm</h1></div>
<form method="get" action="{{route('products')}}">

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
        <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Giá sản phẩm</label>
      <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số lượng</label>
        <input type="number" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
       
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Ảnh sản phẩm</label>
        <input type="text" name="img"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>
    
    <button type="submit" class="btn btn-primary">submit</button>
  </form>
  @endsection