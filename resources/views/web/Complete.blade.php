@extends('decorators.web.index')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-left: 0;padding-right: 0;margin-top: 1">
			<div class="card">
                <div class="card-header">
                    <h4>Hoàn tất thanh toán</h4>
                </div>
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-2"></div>
                		<div class="col-md-8">
                			<!-- <img src="web/img/hoan-tat-thanh-toan.png" alt=""> -->
                			
                		</div>
                		<div class="col-md-2"></div>

                		<div class="col-md-12">
                			<img src="web/img/cart.png" style="margin-left: 490px;margin-right: 520px;margin-top: 50px" alt="">
                		</div>

                		<div class="col-md-2"></div>
                		<div class="col-md-8">
                			<h4 style="font-weight: 400;color: #000;font-family: Arial;margin-top: 40px">Cảm ơn bạn đã mua hàng, Đơn hàng của bạn đã đặt thành công</h4>
                		</div>
                		<div class="col-md-2"></div>

                		<div class="col-md-12">
                			<a href="{{url('trang-chu')}}" class="btn btn-warning" style="margin-top: 20px;margin-left: 470px; border-radius: 20px">Tiếp tục mua sắm</a>
                		</div>
                	</div>
                	<!-- <div class="row" style="margin-top: 20px">
                		<div class="col-md-6">
                			<div class="">
						  		<div class="card-body" style="text-align: center;">
						    		<h5 class="card-title">Thông tin đơn hàng</h5>
						    		<hr>
						    		<div class="col-md-6">
										<p>Tên sản phẩm</p>
						    		</div>
						    		<div class="col-md-6">

						    		</div>
						    		<div class="col-md-6">
										<p>Ngày mua hàng</p>
						    		</div>
						    		<div class="col-md-6">

						    		</div>
						    		<div class="col-md-6">
										<p>Tổng tiền</p>
						    		</div>
						    		<div class="col-md-6">

						    		</div>
						  		</div>
							</div>		
                		</div>
                		<div class="col-md-6">
                			<div class="">
						  		<div class="card-body" style="text-align: center;">
						    		<h5 class="card-title">Địa chỉ thanh toán</h5>
						    		<hr>
						    		<p class="card-text"></p>
						    		<p class="card-text"></p>
						    		<p class="card-text"></p>
						  		</div>
							</div>
                		</div>
                	</div> -->
                </div>
            </div>
		</div>
	</div>
</div>
@endsection