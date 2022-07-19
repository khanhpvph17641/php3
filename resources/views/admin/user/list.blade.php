@extends('layout.master')
@section('title','Quản lý người dùng')
@section('content-title','Quản lý người dùng')
@section('danh-muc','Quản lý người dùng')
@section('content')

        
        <br>
        <form action="" >
            <div style="width:250px" class="input-group input-group-outline">
              <label class="form-label">search here...</label>
              <input type="text" name="search"  class="form-control">
           </div>
          {{-- end search --}}
        </form>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quyền</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ảnh</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        <a class="btn btn-success" style="font-size:10px" href="{{route('users.create')}}"> Add Users</a> 
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user_list as $item)
                    <tr>
                      <td>
                       {{$item->id}}
                      </td>
                      <td>
                        {{$item->name}}
                       </td>
                       <td>
                        {{$item->email}}
                       </td>
                       <td>
                        {{$item->role == 0 ? 'Student':'Teacher'}}
                       </td>
                       <td>
                        <img src="{{asset($item->avatar)}}" alt="" width="100">
                       </td>
                      {{-- <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                      </td> --}}
                      <td class="align-middle">
                        <a href="{{route('users.edit', $item->id)}}">
                          <button class="btn btn-primary"  style="font-size:9px"href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Sửa
                          </button>
                      </a>
                        {{-- form gửi lên id --}}
                        <form action="{{route('users.delete', $item->id)}}" method="POST">
                          <button class="btn btn-danger"  style="font-size:9px"href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Xóa
                          </button>
                         @csrf
                         @method('DELETE')
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                  
            </table>
            
          </div>
          <br>
          <div>{{$user_list->links()}}</div>
@endsection