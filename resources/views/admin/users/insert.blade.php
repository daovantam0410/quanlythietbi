@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Thêm mới thành viên</h1>
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
    @if(session('alertfail'))
    <div class="alert  alert-warning alert-dismissible fade show">
       <span class="badge badge-pill badge-warning">Notification</span> {{session('alertfail')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
   </div>
   @endif
   @if(session('alertinsert'))
    <div class="alert  alert-success alert-dismissible fade show">
       <span class="badge badge-pill badge-success">Notification</span> {{session('alertinsert')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
   </div>
   @endif
    {{--form insert--}}
    <div class="modal-body">
        <form action="{{route('adduser')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên người dùng</label>
                <input name="fullName" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên người dùng . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('fullName')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên đăng nhập</label>
                <input name="userName" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên đăng nhập . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('userName')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu</label>
                <input name="passWord" type="text" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" placeholder="Nhập mật khẩu . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('passWord')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('email')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input name="phoneNumber" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại . . .">
                       <!-- <p class="help is-danger" style="color: red">{{ $errors->first('phoneNumber')}}</p> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input name="address" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ . . .">
                       <!-- <p class="help is-danger" style="color: red">{{ $errors->first('address')}}</p> -->
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="exampleFormControlSelect1">Quyền truy cập</label>
                    <select  name="roleName" class="form-control" id="exampleFormControlSelect1">
                        <option selected value="0">Mời chọn ---</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->rolename}}</option>
                        @endforeach
                    </select>
                    <p class="help is-danger" style="color: red">{{ $errors->first('roleName')}}</p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
            <div class="modal-footer">
                <a href="{{url('listusers')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button></a>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>

@endsection
