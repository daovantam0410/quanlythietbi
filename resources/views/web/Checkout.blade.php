@extends('decorators.web.index')
@section('content')

<div class="container">
	<div class="row">
		@if(count($errors)>0)
		@endif
		<form action="{{url('thanh-toan')}}" method="post">
			@csrf
			<div class="col-md-12" style="padding-left: 0;padding-right: 0;margin-top: 1">
				<div class="card">
	                <div class="card-header">
	                    <h4>Chi tiết thanh toán</h4>
	                </div>

	                <div class="card-body">
	                	<div class="row" style="margin-bottom: 50px">
                			<div class="col-md-2"></div>
		                		<div class="col-md-8">
		                			<img src="web/img/hoan-tat-thanh-toan.png" alt="">
		                		</div>
            				<div class="col-md-2"></div>
	                	</div>
	                	<div class="row">
							
							<div class="row" style="margin-bottom: 30px;">
		                		<div class="col-md-12" style="">
			                		<div class="col-md-12">
			                			<a href="{{url('gio-hang')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> Quay lại giỏ hàng</a>
			                		</div>
								</div>
	                		</div>
	                		

		                		<div class="col-md-12">
		                			<table class="table" style="background-color: #F0F0F0">
										<thead style=" text-align: center;">
									    	<tr>
									      		<!-- <th>Số thứ tự</th> -->
									      		<th>Ảnh sản phẩm</th>
									      		<th>Tên sản phẩm</th>
									      		<th>Giá</th>
									      		<th>Số lượng</th>
									      		<th>Thành tiền</th>
									    	</tr>
										</thead>
										<tbody style="text-align: center;">
											@foreach($checkout as $product)
											<tr>
									    		<!-- <th scope="row">{{$product->id}}</th> -->
									    		<td>
													<img src="upload/{{$product->attributes->images}}" alt="" width="70" height="70">
									    		</td>
										    	<td>{{$product->name}}</td>
										    	<td>{{number_format($product->price,0,"",".")}}</td>
										    	<td>{{$product->quantity}}</td>
										    	<td>{{number_format($product->price*$product->quantity,0,"",".")}}</td>
									    	</tr>
									    	@endforeach
									    	<tfooter>
		                                    <tr>
		                                        <td colspan="4" style="text-align: center;"><b>Tổng tiền đơn hàng</b></td>
		                                        <td style="text-align: center;">{{number_format($total,0,"",".")}} ₫</td>
		                                    </tr>
		                                </tfooter>
										</tbody>
									</table> 
		                		</div>
		                		<div class="col-md-12">
							            @if(Auth::check())
								            <div class="form-row">
											    <div class="form-group col-md-6">
											    	<label for="inputEmail4">Họ và tên</label>
											    	<input name="fullName" value="{{Auth::User()->fullname}}" type="text" class="form-control" id="inputEmail4" placeholder="Nhập vào họ và tên">

											    </div>
											    <div class="form-group col-md-6">
											    	<label for="inputPassword4">Số điện thoại</label>
											    	<input name="phoneNumber" value="{{Auth::User()->phonenumber}}" type="text" class="form-control" id="inputPassword4" placeholder="Nhập vào số điện thoại">
											    	<!-- <p class="help is-danger" style="color: red">{{ $errors->first('phoneNumber')}}</p> -->
											    </div>
											</div>
											<div class="form-row">
											    <div class="form-group col-md-6">
											    	<label for="inputEmail4">Địa chỉ</label>
											    	<input name="address" value="{{Auth::User()->address}}" type="text" class="form-control" id="inputEmail4" placeholder="Nhập vào địa chỉ">
											    	<p class="help is-danger" style="color: red">{{ $errors->first('address')}}</p>
											    </div>
											    <div class="form-group col-md-6">
											    	<label for="inputPassword4">Email</label>
											    	<input name="email" value="{{Auth::User()->email}}" type="text" class="form-control" id="inputPassword4" placeholder="Nhập vào email">
											    </div>
											</div>
											<div class="form-row">
											    <div class="form-group col-md-6">
											    	<label for="inputEmail4">Ghi chú</label>
											    	<input name="note" type="text" class="form-control" id="inputEmail4">
											    </div>
											</div>
										@endif
						        	
		                		</div>
		                		<div class="row" style="margin-bottom: 30px;">
			                		<div class="col-md-12" style="">
				                		<div class="col-md-12">
				                			<a href="{{url('hoan-tat-thanh-toan')}}"><button class="btn btn-warning" type="submit"> Xác nhận <i class="fas fa-arrow-circle-right"></i></button></a>
				                		</div>
									</div>
		                		</div>
	                	</div>
	                </div>
	            </div>
			</div>
		</form>
	</div>
</div>
@endsection