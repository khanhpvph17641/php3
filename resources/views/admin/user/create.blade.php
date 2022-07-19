@extends('layout.master')

@section('title', $user->id !== null ? 'Cập nhật' : 'Thêm mới')

@section('content-title', $user->id !== null ? 'Cập nhật' : 'Thêm mới')
@section('danh-muc', $user->id !== null ? 'Cập nhật User' : 'Thêm mới User')
@section('content')
    @if (!empty($user->id))
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @endif
    <br>
    @csrf
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="form3Example1" value="{{ isset($user) ? $user->name : '' }}" name="name"
                    class="form-control" />
                <label class="form-label" for="form3Example1">Name</label>
            </div>
        </div>
    </div><!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="email" id="form3Example1" value="{{ isset($user) ? $user->email : '' }}" name="email"
                    class="form-control" />
                <label class="form-label" for="form3Example1">Email</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="password" name="password" value="{{ isset($user) ? $user->password : '' }}" id="form3Example2"
                    class="form-control" />
                <label class="form-label" for="form3Example2">Password</label>
            </div>
        </div>
    </div>
    <!-- Mã tài khoản input -->
    <div class="form-outline mb-4">
        <input type="text" id="form3Example3" value="{{ isset($user) ? $user->username : '' }}" name="username"
            class="form-control" />
        <label class="form-label" for="form3Example3">Mã sinh viên</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="form3Example3" value="{{ isset($user) ? $user->code : '' }}" name="code"
            class="form-control" />
        <label class="form-label" for="form3Example3">Mã code</label>
    </div>
    <!-- Ảnh đại diện input -->
    <div class="form-outline mb-4">
        <input type="file" id="form3Example4" name="avatar" class="form-control" />
        <br>
        <img src="{{ asset($user->avatar) }}" width="120" alt="">
        <label class="form-label" for="form3Example4">Ảnh đại diện</label>
    </div>

    <!-- Checkbox -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4"> Phân Quyền </label>
        <input type="radio" id="form3Example4" name="role" value="1" {{ $user->role == 1 ? ' checked=""' : '' }} />
        Teacher
        <input type="radio" id="form3Example4" name="role" value="0" {{ $user->role == 0 ? ' checked=""' : '' }} />
        Student
    </div>

    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4"> Trạng Thái </label>
        <input type="radio" id="form3Example4" name="status" value="1"
            {{ $user->status == 1 ? ' checked=""' : '' }} /> Private
        <input type="radio" id="form3Example4" name="status" value="0"
            {{ $user->status == 0 ? ' checked=""' : '' }} /> Publish
    </div>
    <!-- Submit button -->
    <button type="submit"
        class="btn btn-primary btn-block mb-4">{{ $user->id !== null ? 'Cập nhật' : 'Thêm mới' }}</button>

    <!-- Register buttons -->
    <button type="reset" class="btn btn-warning btn-block mb-4">Nhập lại</button>

    </form>
@endsection
