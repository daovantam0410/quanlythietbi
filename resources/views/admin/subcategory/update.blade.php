@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Chỉnh sửa tên hãng</h1>
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
    @if(session('alert'))
        <div class="alert  alert-info alert-dismissible fade show">
            <span class="badge badge-pill badge-info">Notification</span> {{session('alert')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{--form update--}}
    <div class="modal-body">
        <form action="{{route('updatesubcategory',$getSubcate[0]->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên hãng</label>
                <input name="subCategory" value="{{$getSubcate[0]->subcategoryname}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tiêu đề . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('subCategory')}}</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Tên tiêu đề</label>
                    <select  name="categoryId" class="form-control" id="exampleFormControlSelect1">
                        <option value="{{$getSubcate[0]->category_id}}">{{$getSubcate[0]->categoryname}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="modal-footer">
                <a href="{{url('listsub')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button></a>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
@endsection
