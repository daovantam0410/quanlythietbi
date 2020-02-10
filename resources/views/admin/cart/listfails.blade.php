@extends('decorators.admin.index')
@section('content')

<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>
                    	<a href="{{url('danh-sach-don-hang-da-xu-ly')}}">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Đơn hàng đã xử lý
                            </button>
                        </a>
                    </h1>
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
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách đơn hàng chưa xử lý</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Tên khách hàng</th>
                                    <th style="text-align: center;">Số điện thoại</th>
                                    <th style="text-align: center;">Ngày đặt hàng</th>
                                    <th style="text-align: center;">Xem</th>
                                    <th style="text-align: center;">Tình trạng</th>
                                    <!-- <th style="text-align: center;">Xử lý</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($findOrderfails as $orderfails)
                                    <tr>
                                        <td style="text-align: center;">{{$orderfails->id}}</td>
                                        <td style="text-align: center;">{{$orderfails->fullname}}</td>
                                        <td style="text-align: center;">{{$orderfails->phonenumber}}</td>
                                        <td style="text-align: center;">{{$orderfails->created_at}}</td>
                                        <td style="text-align: center;"><a href="{{url('chi-tiet-don-hang-chua-xu-ly',$orderfails->id)}}">Chi tiết</a></td>
                                        <td style="text-align: center;">{{$orderfails->status}}</td>
                                        <!-- <td style="text-align: center;">
                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')"><a href="#"><i class="menu-icon fa fa-trash" ></i></a></button>
                                        </td> -->
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