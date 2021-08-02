@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Chỉnh sửa sản phẩm</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">

                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if(count($errors)>0)
    @endif
    @if(session('alertfail'))
    <div class="alert  alert-danger alert-dismissible fade show">
       <span class="badge badge-pill badge-danger">Notification</span> {{session('alertfail')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
   </div>
   @endif
   @if(session('alertupdate'))
    <div class="alert  alert-info alert-dismissible fade show">
       <span class="badge badge-pill badge-info">Notification</span> {{session('alertupdate')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
   </div>
   @endif
    {{--form update--}}
    <div class="modal-body">
        <form action="{{route('updateproduct',$getProduct[0]->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Mã sản phẩm</label>
                <input name="maSanPham" value="{{$getProduct[0]->series}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tiêu đề . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('maSanPham')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input name="tenSanPham" value="{{$getProduct[0]->productname}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tiêu đề . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('tenSanPham')}}</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Tên danh mục</label>
                    <select  name="tenDanhMuc" class="form-control" id="exampleFormControlSelect1">
                        <option value="{{$getProduct[0]->category_id}}">{{$getProduct[0]->categoryname}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Tên hãng</label>
                    <select  name="tenHang" class="form-control" id="exampleFormControlSelect1">
                        <option value="{{$getProduct[0]->subcategory_id}}">{{$getProduct[0]->subcategoryname}}</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->subcategoryname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Chọn ảnh</label>
                <div class="custom-file">
                    <input name="anh" type="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    <img src="upload/{{$getProduct[0]->thumbnail}}" width="50px" height="50px">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Thông số kỹ thuật</label>
                <input name="thongSoKyThuat" value="{{$getProduct[0]->specification}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tiêu đề . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('thongSoKyThuat')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nội dung</label>
                <textarea name="noiDung" type="text" class="form-control"
                       id="demo" aria-describedby="emailHelp">{!!$getProduct[0]->content!!}</textarea>
                       <p class="help is-danger" style="color: red">{{$errors->first('noiDung')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá bán</label>
                <input name="gia" value="{{$getProduct[0]->price}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                       <p class="help is-danger" style="color: red">{{ $errors->first('gia')}}</p>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputEmail1">Số lượng</label>
                <input name="soLuong" value="{{$getProduct[0]->quantity}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                       <p class="help is-danger" style="color: red">{{ $errors->first('soLuong')}}</p>
            </div> -->
            <div class="form-group">
                <label for="exampleInputEmail1">Tình trạng</label>
                <input name="tinhTrang" value="{{$getProduct[0]->status}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                       <p class="help is-danger" style="color: red">{{ $errors->first('tinhTrang')}}</p>
            </div>
            <!-- <div class="row">
                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Tên danh mục</label>
                    <select  name="tenDanhMuc" class="form-control" id="exampleFormControlSelect1">
                        <option value="{{$getProduct[0]->category_id}}">{{$getProduct[0]->categoryname}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Tên hãng</label>
                    <select  name="tenHang" class="form-control" id="exampleFormControlSelect1">
                        <option value="{{$getProduct[0]->subcategory_id}}">{{$getProduct[0]->subcategoryname}}</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->subcategoryname}}</option>
                        @endforeach
                    </select>
                </div>
            </div> -->
            <div class="modal-footer">
                <a href="{{url('listproduct')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button></a>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
<script>
    CKEDITOR.replace('demo');
</script>
@stop
