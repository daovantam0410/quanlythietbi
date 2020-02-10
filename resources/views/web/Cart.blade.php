@extends('decorators.web.index')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-left: 0;padding-right: 0;margin-top: 1">
			<div class="card">
                <div class="card-header">
                    <h4>Giỏ hàng</h4>
                </div>

                <div class="card-body">
                	<div class="row" style="margin-bottom: 50px">
                		<div class="col-md-2"></div>
	                		<div class="col-md-8">
	                			<img src="web/img/trang-gio-hang.png" alt="">
	                		</div>
                		<div class="col-md-2"></div>
                	</div>
                	
					<table class="table" >
						<thead style="background-color: #F0F0F0">
					    	<tr>
					      		<!-- <th>Số thứ tự</th> -->
					      		<!-- <th>Mã sản phẩm</th> -->
					      		<th>Ảnh sản phẩm</th>
					      		<th>Tên sản phẩm</th>
					      		<th>Giá</th>
					      		<th>Số lượng</th>
					      		<th>Thành tiền</th>
					      		<th>Xử lý</th>
					    	</tr>
						</thead>
						<tbody>

							@foreach($getCart as $product)
							<tr>
					    		<!-- <th scope="row">{{$product->id}}</th> -->
					    		<!-- <td>{{$product->series}}</td> -->
					    		<td>
					    			<img src="upload/{{$product->attributes->images}}" alt="" width="70" height="70">
					    			
					    		</td>
						    	<td>{{$product->name}}</td>
						    	<td>{{number_format($product->price,0,"",".")}}</td>
						    	<td>
						    		<!-- <input type="text" hidden="" value="{{$product->id}}" id="id_pro"> -->
						    		<input onchange="update({{$product->id}},this.value)" style="width: 90px; height: 38px" type="number" id="quantity" name="quantity" min="1"
										class="form-control input-number text-center quantity" value="{{$product->quantity}}">
						    	</td>
						    	<td>{{number_format($product->price*$product->quantity,0,"",".")}}</td>
						    	<td>
						    		<!-- <button onclick="loadData({{$product->id}})"><i class="fa fa-refresh"></i></button> -->
									<a href="{{url('xoa-gio-hang',$product->id)}}" ><i class="fa fa-close"></i></a>
								</td>
					    	</tr>
					    	@endforeach
						</tbody>
					</table>          
                </div>
                <div class="row" style="margin-bottom: 30px;">
                	<div class="col-md-9"></div>
                	<div class="col-md-3">
                		<div class="col-md-12" style="">
                			<div class="row">
                				<div class="col-md-6"><b>Tổng tiền: </b></div>
                				<div class="col-md-6">{{number_format($total,0,"",".")}}</div>
                			</div>
                		</div>
                		<hr  style="margin-right: 21px; background-color: #FF9600">
                		<div class="col-md-12" style="">
							<div class="row">
		                		<div class="col-md-2"></div>
		                		@if(Auth::check())
			    					@if(Auth::User()->roleid==3)
			    					
					                		<div class="col-md-8">
					                			<a href="{{url('thanh-toan')}}" class="btn btn-warning">Xác nhận <i class="fas fa-arrow-circle-right"></i></a>
					                		</div>
									@endif
								@endif
								@if(Auth::check()==false)
									<div class="col-md-8">
		                				<a class="btn"><button onclick="myFunction()" type="button" class="btn btn-warning">Xác nhận <i class="fas fa-arrow-circle-right"></i></button></a>
				                	</div>
								@endif
								</div>
		                		<div class="col-md-2"></div>
							</div>
						</div>
                	</div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

@section('script')
	
	<script type="text/javascript">
	function myFunction(){
		alert("Bạn cần phải đăng nhập để mua hàng !");
	}

	var update = (id,qty) =>{
		// var soluong = document.forms["quantity"].value;
		// if (soluong == "") {
		// 	alert("Giá trị nhập không phù hợp !");
		// 	return false;
		// }
		var url = `{{url('sua-gio-hang/')}}/${id}/${qty}`;
		$.ajax({
			url:url,
			method:'GET',
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        
	        success: function(response)
	        {

	        	location.reload();
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

	// $(document).ready(function(){
	// 	//Sự kiện khi ô input có id là quantity thay đổi
	// 	$('#quantity').change(function(){
	// 		//Lấy số lượng
	// 		var qty = $('#quantity').val();
	// 		//Lấy ID
	// 		var id = $('#id_pro').val();
	// 		var url = `{{url('sua-gio-hang/')}}/${id}/${qty}`;
	// 		$.ajax({
	// 			url:url,
	// 			method:'GET',
	// 			// headers: {
	// 	  //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 	  //       },
	// 	        success: function(response)
	// 	        {
	// 	        	location.reload();
		        	
	// 	        	console.log("success");
	// 	        	console.log(response);
	// 	        },
	// 	        erros: function(response)	
	// 	        {
	// 	        	console.log("erros");
	// 	        	console.log(response);
	// 	        }
	// 		});
	// 	});
	// });

	// document.getElementById("quantity").onchange = function(){myFunction()};
	// function myFunction(){
	// 	var x = document.getElementById("quantity");
	// 	x.value = x.value.toUpperCase();
	// }
	
	// function update(id,qty)
	// {
	// 	$.get("/sua-gio-hang/"+id+"/"+qty,
	// 		function(data)
	// 		{
	// 			if (data=="success") {
	// 				location.reload();
	// 			}else {
	// 				alert("Cập nhật thất bại !");
	// 			}
	// 		}
	// 	)
		// var url = `{{url('sua-gio-hang/')}}/${id}/${qty}`;
		// $.ajax({
		// 	url:url,
		// 	method:'POST',
		// 	headers: {
	 //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	 //        },
	 //        success: function(response)
	 //        {
	 //        	location.reload();
	 //        	console.log("success");
	 //        	console.log(response);
	 //        },
	 //        erros: function(response)	
	 //        {
	 //        	console.log("erros");
	 //        	console.log(response);
	 //        }
		// });
		// $.get("/sua-gio-hang/"+id+"/"+qty,
		// 	function(data)
		// 	{
		// 		if (data=="success") {
		// 			location.reload();
		// 		}else {
		// 			alert("Cập nhật thất bại !");
		// 		}
		// 	}
		// )
	
	</script>
@stop

