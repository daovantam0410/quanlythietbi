@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Chỉnh sửa thành viên</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">

                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if(count($errors)>0)
    @endif
    @if(session('alert'))
        <div class="alert  alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Notification</span> {{session('alert')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('alertupdate'))
        <div class="alert  alert-info alert-dismissible fade show">
            <span class="badge badge-pill badge-info">Notification</span> {{session('alertupdate')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{--form update--}}
    <div class="modal-body">
        <form action="{{route('updateuser',$getUser[0]->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên người dùng</label>
                <input name="fullName" value="{{$getUser[0]->fullname}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên người dùng . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('fullName')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên đăng nhập</label>
                <input name="userName" value="{{$getUser[0]->name}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên đăng nhập . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('userName')}}</p>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu hiện tại</label>
                <input name="password" value="{{$getUser[0]->password}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                       <p class="help is-danger" style="color: red">{{ $errors->first('password')}}</p>
            </div> -->
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" value="{{$getUser[0]->email}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('email')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input name="phoneNumber" value="{{$getUser[0]->phonenumber}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại . . .">
                       <!-- <p class="help is-danger" style="color: red">{{ $errors->first('email')}}</p> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input name="address" value="{{$getUser[0]->address}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ . . .">
                       <!-- <p class="help is-danger" style="color: red">{{ $errors->first('email')}}</p> -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Chức danh</label>
                    <select  name="roleName" class="form-control" id="exampleFormControlSelect1">
                        <option value="{{$getUser[0]->roleid}}">{{$getUser[0]->description}}</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
@endsection
