@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <a href="{{url('them-san-pham')}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Thêm mới
                            </button>
                        </a>
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
  <!--  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addproduct')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã sản phẩm</label>
                            <input name="maSanPham" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập mã sản phẩm . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input name="tenSanPham" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chọn ảnh</label>
                            <div class="custom-file">
                                <input name="anh" type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thông số kỹ thuật</label>
                            <input name="thongSoKyThuat" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập thông số kỹ thuật . . .">
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <input name="noiDung" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập nội dung . . .">
                        </div> -->

<!--                         <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea name="noiDung" class="form-control ckeditor" id="demo"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán</label>
                            <input name="gia" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập giá bán . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input name="soLuong" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập số lượng . . .">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tình trạng sản phẩm</label>
                            <input name="trangThai" type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Nhập trạng thái . . .">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Tên danh mục</label>
                                <select  name="tenDanhMuc" class="form-control" id="exampleFormControlSelect1">
                                    <option selected>Chọn tên danh mục ---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Tên hãng</label>
                                <select  name="tenHang" class="form-control" id="exampleFormControlSelect1">
                                    <option selected>Chọn tên hãng ---</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->subcategoryname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>  -->

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <!-- <div class="topnav">
                    <a class="active" href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
                    <input type="text" placeholder="Search..">
                </div> -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách sản phẩm</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Mã sản phẩm</th>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th style="text-align: center;">Ảnh sản phẩm</th>
                                    <th style="text-align: center;">Tình trạng</th>
                                    <th style="text-align: center;">Hãng</th>
                                    <th style="text-align: center;">Danh mục</th>
                                    <th style="text-align: center;">Xử lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($findAll as $product)
                                    <tr>
                                        <td style="text-align: center;">{{$product->id}}</td>
                                        <td style="text-align: center;">{{$product->series}}</td>
                                        <td style="text-align: center;"><a href="{{route('updateproduct',$product->id)}}">{{$product->productname}}</a></td>
                                        <td style="text-align: center;"><img src="upload/{{$product->thumbnail}}" width="70px" height="70px"></td>
                                        <td style="text-align: center;">{{$product->status}}</td>
                                        <td style="text-align: center;">{{$product->subcategoryname}}</td>
                                        <td style="text-align: center;">{{$product->categoryname}}</td>
                                        <td style="text-align: center;">
                                            <a href="{{route('updateproduct',$product->id)}}" class="btn btn-info"><i class="menu-icon fa fa-pencil-square"></i></a>
                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm không?')"><a href="{{route('deleteproduct',$product->id)}}"><i class="menu-icon fa fa-trash" ></i></a></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
        <div class="row justify-content-center" style="margin-top: 18px">{{$findAll->links()}}</div>
    </div><!-- .content -->
@endsection
