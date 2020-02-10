@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Chỉnh sửa thông tin khách hàng</h1>
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
        <div class="alert  alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Notification</span> {{session('alert')}}
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
        <form action="{{route('updatecustomer',$getCustomer[0]->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên khách hàng</label>
                <input name="name" value="{{$getCustomer[0]->name}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" >
                       <p class="help is-danger" style="color: red">{{ $errors->first('name')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giới tính</label>
                <input name="gender" value="{{$getCustomer[0]->gender}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                       <p class="help is-danger" style="color: red">{{ $errors->first('gender')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input name="phoneNumber" value="{{$getCustomer[0]->phone_number}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                       <p class="help is-danger" style="color: red">{{ $errors->first('phoneNumber')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" value="{{$getCustomer[0]->email}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" >
                       <p class="help is-danger" style="color: red">{{ $errors->first('email')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input name="address" value="{{$getCustomer[0]->address}}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                       <p class="help is-danger" style="color: red">{{ $errors->first('address')}}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
@endsection
