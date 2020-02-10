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
                        <a href="{{url('them-khach-hang')}}">
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

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách khách hàng</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Tên khách hàng</th>
                                    <th style="text-align: center;">Giới tính</th>
                                    <th style="text-align: center;">Số điện thoại</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Địa chỉ</th>
                                    <th style="text-align: center;">Xử lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($findAll as $customer)	
                                    <tr>
                                        <td style="text-align: center;">{{$customer->id}}</td>
                                        <td style="text-align: center;"><a href="{{route('updatecustomer',$customer->id)}}">{{$customer->name}}</a></td>
                                        <td style="text-align: center;">{{$customer->gender}}</td>
                                        <td style="text-align: center;">{{$customer->phone_number}}</td>
                                        <td style="text-align: center;">{{$customer->email}}</td>
                                        <td style="text-align: center;">{{$customer->address}}</td>
                                        <td style="text-align: center;">
                                            <a href="{{route('updatecustomer',$customer->id)}}" class="btn btn-info">
                                                <i class="menu-icon fa fa-pencil-square"></i>
                                            </a>
                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa thành viên này không?')"><a href="{{route('deletecustomer',$customer->id)}}">
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
    </div><!-- .content -->

@endsection