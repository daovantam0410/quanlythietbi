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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Thêm mới
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if(count($errors)>0)
        <div class="alert  alert-danger alert-dismissible fade show">
            @foreach($errors->all() as $err)
                <span class="badge badge-pill badge-danger">Notification</span> {{$err}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            @endforeach
        </div>
    @endif
    @if(session('alertdelete'))
        <div class="alert  alert-info alert-dismissible fade show">
            <span class="badge badge-pill badge-info">Notification</span> {{session('alertdelete')}}
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm quyền truy cập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addrole')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chức danh</label>
                            <input name="roleName" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập chức danh . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <input name="description" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập mô tả . . .">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách quyền truy cập</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Chức danh</th>
                                    <th style="text-align: center;">Mô tả</th>
                                    <th style="text-align: center;">Xử lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($findAll as $role)
                                    <tr>
                                        <td style="text-align: center;">{{$role->id}}</td>
                                        <td style="text-align: center;">{{$role->rolename}}</td>
                                        <td style="text-align: center;">{{$role->description}}</td>
                                        <td style="text-align: center;">
                                            <a href="{{route('updaterole',$role->id)}}" class="btn btn-info">
                                                <i class="menu-icon fa fa-pencil-square"></i>
                                            </a>
                                            <!-- <a href="{{route('deleterole',$role->id)}}" class="btn btn-danger">
                                                <i class="menu-icon fa fa-trash" onclick=""></i>
                                            </a> -->
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
    </div><!-- .content -->
@endsection
