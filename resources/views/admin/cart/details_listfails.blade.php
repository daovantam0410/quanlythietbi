@extends('decorators.admin.index')
@section('content')

<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>
                    	<a href="{{url('danh-sach-don-hang-chua-xu-ly')}}">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            Quay lại
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
                        <a href="{{url('danh-sach-don-hang-chua-xu-ly')}}">
                            <button type="submit" class="btn btn-success" onclick="loadData({{$detailsOrderfails[0]->billId}})">
                            Duyệt
                            </button>
                            </a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        
        <div class="animated fadeIn">
            <!-- <form action="{{url('chi-tiet-don-hang-chua-xu-ly',$detailsOrderfails[0]->billId)}}" enctype="multipart/form-data">
            @csrf -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card ">
                        <h4 class="card-header text-center bg-info">Thông tin khách hàng</h4>
                            <div class="card-body ">
                                <div class="col-md-6"><b>Họ tên:</b></div>
                                <div class="col-md-6">{{$detailsOrderfails[0]->fullname}}</div>
                                <div class="col-md-6"><b>Số điện thoại:</b></div>
                                <div class="col-md-6">{{$detailsOrderfails[0]->phonenumber}}</div>
                                <div class="col-md-6"><b>Email:</b></div>
                                <div class="col-md-6">{{$detailsOrderfails[0]->email}}</div>
                                <div class="col-md-6"><b>Địa chỉ:</b></div>
                                <div class="col-md-6">{{$detailsOrderfails[0]->address}}</div>
                                <div class="col-md-6"><b>Ghi chú:</b></div>
                                <div class="col-md-6"><b>{{$detailsOrderfails[0]->note}}</b></div>
                          </div>
                    </div>
                </div>
                <div class="col-md-3"></div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Chi tiết đơn hàng</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Ảnh sản phẩm</th>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th style="text-align: center;">Số lượng</th>
                                    <th style="text-align: center;">Giá sản phẩm</th>
                                    <th style="text-align: center;">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($detailsOrderfails as $product)
                                    <tr>
                                        <td style="text-align: center;">{{$product->bill_product_id}}</td>
                                        <td style="text-align: center;"><img src="upload/{{$product->thumbnail}}" width="70px" height="70px" alt=""></td>
                                        <td style="text-align: center;">{{$product->productname}}</td>
                                        <td style="text-align: center;">{{$product->quantity}}</td>
                                        <td style="text-align: center;">{{number_format($product->price,0,"",".")}}</td>
                                        <td style="text-align: center;">{{number_format($product->quantity*$product->price,0,"",".")}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <td colspan="5" style="text-align: center;"><b>Tổng tiền</b></td>
                                        <td style="text-align: center;">{{number_format($detailsOrderfails[0]->total_price,0,"",".")}}</td>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection

@section('script')
<script type="text/javascript">
    var loadData = (billId) =>{
        var url = `{{url('chi-tiet-trang-thai/')}}/${billId}`;
        $.ajax({
            url:url,
            method:'GET',
            
            success: function(response)
            {

                console.log("success");
                console.log(response);
            },
            erros: function(response)   
            {
                console.log("erros");
                console.log(response);
            }
        });
    }
</script>
@stop