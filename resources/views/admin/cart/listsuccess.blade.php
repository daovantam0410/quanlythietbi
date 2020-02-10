@extends('decorators.admin.index')
@section('content')
<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>
                        <a href="{{url('danh-sach-don-hang-chua-xu-ly')}}">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Đơn hàng chưa xử lý
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
    {{--form insert--}}
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách đơn hàng đã xử lý</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Tên khách hàng</th>
                                    <th style="text-align: center;">Số điện thoại</th>
                                    <th style="text-align: center;">Ngày đặt hàng</th>
                                    <th style="text-align: center;">Ngày thanh toán</th>
                                    <th style="text-align: center;">Xem</th>
                                    <th style="text-align: center;">Tình trạng</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($findOrderSuccess as $orderSuccess)
                                    <tr>
                                        <td style="text-align: center;">{{$orderSuccess->id}}</td>
                                        <td style="text-align: center;">{{$orderSuccess->fullname}}</td>
                                        <td style="text-align: center;">{{$orderSuccess->phonenumber}}</td>
                                        <td style="text-align: center;">{{$orderSuccess->created_at}}</td>
                                        <td style="text-align: center;">{{$orderSuccess->updated_at}}</td>
                                        <td style="text-align: center;"><a href="{{url('chi-tiet-don-hang-da-xu-ly',$orderSuccess->id)}}">Chi tiết</a></td>
                                        <td style="text-align: center;">{{$orderSuccess->status}}</td>
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