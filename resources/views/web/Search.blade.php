@extends('decorators.web.index')
@section('content')

<div class="container" id="product">
    <h4>Tìm kiếm</h4>
    <p>Tìm thấy {{count($searchs)}} sản phẩm với từ khóa "{{$tukhoa}}"</p>
	<div class="row">
		@foreach($searchs as $search)
		<div class="col-md-3 list-product">
			<div class="card" id="card">
		  		<img src="upload/{{$search->thumbnail}}" class="card-img-top" alt="..."  height="200px">
		  		<hr>
		  		<div class="card-body">
		    		<h5 class="card-title"  style="
		    		height: 48px;margin-bottom: 30px">{{$search->productname}}</h5>
		    		<h6 class="card-text">Giá bán: {{number_format($search->price,0,"",".")}} ₫</h6>
		    		<a href="{{url('chi-tiet-san-pham',$search->id)}}" class="btn btn-primary">Chi tiết</a>
		  		</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection