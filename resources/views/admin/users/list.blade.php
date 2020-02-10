@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <a href="{{url('them-thanh-vien')}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Thêm mới
                            </button>
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if(session('alert'))
        <div class="alert  alert-info alert-dismissible fade show">
            <span class="badge badge-pill badge-info">Notification</span> {{session('alert')}}
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
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thành viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('adduser')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người dùng</label>
                            <input name="fullName" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập tên người dùng . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên đăng nhập</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập tên đăng nhập . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập email . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input name="passWord" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập mật khẩu . . .">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1">Quyền truy cập</label>
                                <select  name="roleName" class="form-control" id="exampleFormControlSelect1">
                                    <option selected>Mời chọn ---</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->rolename}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách thành viên</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Tên người dùng</th>
                                    <th style="text-align: center;">Tên đăng nhập</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Chức danh</th>
                                    <th style="text-align: center;">Xử lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($findAll as $user)
                                    <tr>
                                        <td style="text-align: center;">{{$user->id}}</td>
                                        <td style="text-align: center;"><a href="{{route('updateuser',$user->id)}}">{{$user->fullname}}</a></td>
                                        <td style="text-align: center;">{{$user->name}}</td>
                                        <td style="text-align: center;">{{$user->email}}</td>
                                        <td style="text-align: center;">{{$user->description}}</td>
                                        <td style="text-align: center;">
                                            <a href="{{route('updateuser',$user->id)}}" class="btn btn-info">
                                                <i class="menu-icon fa fa-pencil-square"></i>
                                            </a>
                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa thành viên này không?')"><a href="{{route('deleteuser',$user->id)}}">
                                                <i class="menu-icon fa fa-trash"></i>
                                            </a></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
        <div class="row justify-content-center" style="margin-top: 18px">{{$findAll->links()}}</div>
    </div><!-- .content -->
@endsection
