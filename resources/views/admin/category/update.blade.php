@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Chỉnh sửa tiêu đề</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Lưu thay đổi
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if(count($errors)>0)
    @endif
    @if(session('alert'))
        <div class="alert  alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Notification</span> {{session('alert')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('alertupdate'))
        <div class="alert  alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Notification</span> {{session('alertupdate')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{--form update--}}
    <div class="modal-body">
        <form action="{{route('updatecategory',$getCategory[0]->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên tiêu đề</label>
                <input name="categoryName" value="{{$getCategory[0]->categoryname}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tiêu đề . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('categoryName')}}</p>
            </div>
            <div class="modal-footer">
                <a href="{{url('listcategory')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button></a>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
@endsection
