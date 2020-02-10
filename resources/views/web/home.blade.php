@extends('decorators.web.index')
@section('content')

<div class="container" id="product">
	<div class="row">
		@foreach($homePage as $product)
		<div class="col-md-3 list-product">
			<div class="card" id="card">
		  		<img src="upload/{{$product->thumbnail}}" class="card-img-top" alt="..."  height="200px">
		  		<hr>
		  		<div class="card-body">
		    		<h5 class="card-title"  style="
		    		height: 48px;margin-bottom: 30px">{{$product->productname}}</h5>
		    		<h6 class="card-text">Giá bán: {{number_format($product->price,0,"",".")}} ₫</h6>
		    		<a href="{{url('chi-tiet-san-pham',$product->id)}}" class="btn btn-primary">Chi tiết</a>
		  		</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="row justify-content-center" style="margin-top: 18px">{{$homePage->links()}}</div>
@endsection

