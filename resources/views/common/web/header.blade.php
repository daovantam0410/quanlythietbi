<!-- Navigation -->
	<div class="container nav-top">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a id="home" class="navbar-brand nav-font nav-color" href="trang-chu"><i class="fa fa-home"></i> Trang chủ</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link nav-font nav-color" href="{{url('gioi-thieu')}}"><i class='far fa-address-card'></i> Giới thiệu <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-font nav-color"><i class='far fa-bell'></i> Thông báo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-font nav-color">
							<i class="fa fa-globe"></i> Dịch vụ
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled nav-color" tabindex="-1" aria-disabled="true"><i class="fa fa-fw fa-envelope"></i> Liên hệ</a>
					</li>
				</ul>

				<ul class="navbar-nav my-2 my-lg-0">
					@if(Auth::check())
						@if(Auth::User()->roleid==1)
							<li class="nav-item active">
								<a class="nav-link nav-font nav-color">Xin chào, {{Auth::User()->fullname}} <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-font nav-color" href="{{url('dang-xuat')}}">Đăng xuất</a>
							</li>
						@endif
						@if(Auth::User()->roleid==3)
							<li class="nav-item active">
								<a class="nav-link nav-font nav-color">Xin chào, {{Auth::User()->fullname}} <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-font nav-color" href="{{url('dang-xuat')}}">Đăng xuất</a>
							</li>
						@endif
					@endif
					@if((Auth::check()==false))
						<li class="nav-item active">
							<a class="nav-link nav-font nav-color" href="dang-nhap">Đăng nhập <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link nav-font nav-color" href="{{url('dang-ky')}}">Đăng ký</a>
						</li>
					@endif
				</ul>
			</div>
		</nav>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
        			...
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			<button type="button" class="btn btn-primary">Save changes</button>
      			</div>	
    		</div>
  		</div>
	</div>

	<div class="container nav-top-1" id="nav-top-1">
		<div class="row nav-header-1">
			<div class="col-md-6">
				<form action="{{url('tim-kiem')}}" method="get" class="input-group mb-3" id="form-search" enctype="multipart/form-data">
					@csrf
					<input name="tukhoa" type="text" class="form-control" placeholder="Tìm ở đây . . .">
					<div class="input-group-append">
						<button class="btn btn-danger" type="submit"><i class='fas fa-search'></i></button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-4">
						<b class="nav-color "><i class='far fa-clock'></i> Giờ làm việc</b>
						<p class="nav-color">8:00 AM - 5:30 PM</p>	
					</div>
					<div class="col-md-4">
						<b class="nav-color"><i class='fas fa-phone'></i> HOTLINE</b>
						<b class="nav-color">0123456789</b>	
					</div>
					
					<div class="col-md-4">
						<?php
						$cart = Cart::getContent();
						?> 
						<a href="{{url('gio-hang')}}"><b class="nav-color"><i class='fas fa-shopping-cart'></i> Giỏ hàng <span class="badge badge-light">{{$cart->count()}}</span></b></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- menu -->
	<div class="container nav-top-2">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					@foreach($categories as $category)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle nav-font nav-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{$category->categoryname}} 
							</a>
							 <?php $subcate = DB::table('subcategory')->where('category_id',$category->id)->get()?>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									@foreach($subcate as $subcategory)
										<a class="dropdown-item nav-font" href="{{url('san-pham-theo-hang',$subcategory->id)}}">{{$subcategory->subcategoryname}}</a>
									@endforeach
								</div>
						</li>
					@endforeach
				</ul>
				
				<ul class="navbar-nav my-2 my-lg-0">
				</ul>
			</div>
		</nav>
	</div>
	
	<!-- Page-content -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="a1">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="web/img/anhbia.png" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="web/img/anhbia1.png" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="web/img/anhbia2.png" class="d-block w-100" alt="...">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>