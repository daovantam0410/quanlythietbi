@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Chỉnh sửa quyền truy cập</h1>
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
        <form action="{{route('updaterole',$getRole[0]->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên đăng nhập</label>
                <input name="roleName" value="{{$getRole[0]->rolename}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên đăng nhập . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('roleName')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input name="description" value="{{$getRole[0]->description}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mô tả . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('description')}}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
@endsection
