@extends('decorators.web.index')
@section('content')

<div class="container">
	<hr>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">
					<h4>Đặt hàng</h4>
				</li>
			</ol>
		</nav>
		<!-- <div class="fs-ghltb clearfix">
			<form action="{{url('dat-hang')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-5">
					<div class="card-body">
			    		<img src="upload/{{$detailsProduct[0]->thumbnail}}" width="300px" height="280px" alt="">
					</div>
				</div>
				
				<div class="col-md-7">
					<div class="card-body">
		    			<h4 class="card-title" style="
			    		height: 48px;">{{$detailsProduct[0]->productname}}</h4>
			    		<h5 class="card-text" style="color: red">{{number_format($detailsProduct[0]->price)}} ₫</h5>
			    		<button type="Submit" class="btn btn-primary"> Xác nhận đặt hàng</button>
					</div>
				</div>
			</div>
		</form>
		</div> -->
		
	<hr>
</div>
@endsection