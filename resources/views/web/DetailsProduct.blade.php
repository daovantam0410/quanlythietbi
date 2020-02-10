@extends('decorators.web.index')
@section('content')

<div class="container">
	<hr>
		<div class="row">
			<!-- <form action="{{url('cart/add')}}" method="get"></form> -->
				<div class="col-md-5">
					<div class="card-body">
			    		<img src="upload/{{$detailsProduct[0]->thumbnail}}" width="300px" height="280px" alt="">
					</div>
				</div>
			
				<div class="col-md-7">
					<div class="card-body">
		    			<h4 class="card-title" style="
			    		height: 48px;">{{$detailsProduct[0]->productname}}</h4>
			    		<h5 class="card-text" style="color: red">{{number_format($detailsProduct[0]->price,0,"",".")}} ₫</h5>
			    		<h6>Mã sản phẩm: {{$detailsProduct[0]->series}}</h6>
			    		<b class="card-text">Thông số tóm tắt</b>
			    		<p>{!!$detailsProduct[0]->specification!!}</p>
			    		<b class="card-text">Mô tả sản phẩm</b>
			    		<p>{!!$detailsProduct[0]->content!!}</p>
			    		<button class="btn btn-primary" onclick="loadData({{$detailsProduct[0]->id}});addsuccess()">
			    			Thêm giỏ hàng
			    		</button>
					</div>
				</div>
		</div>
	<hr>
</div>
@endsection


@section('script')
	<script type="text/javascript">
	function addsuccess(){
		alert("Đã thêm sản phẩm vào giỏ hàng !");
	}
	var loadData = (id) =>{
		var url = `{{url('gio-hang/')}}/${id}`;
		$.ajax({
			url:url,
			method:'POST',
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
	</script>
@stop