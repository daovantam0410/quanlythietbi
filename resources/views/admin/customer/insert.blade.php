@extends('decorators.admin.index')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Thêm mới khách hàng</h1>
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
    <div class="alert  alert-warning alert-dismissible fade show">
       <span class="badge badge-pill badge-warning">Notification</span> {{session('alertfail')}}
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
    <div class="modal-body">
        <form action="{{route('addcustomer')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên khách hàng</label>
                <input name="name" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên khách hàng . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('name')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giới tính</label>
                <input name="gender" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giới tính . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('gender')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input name="phoneNumber" type="text" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" placeholder="Nhập số điện thoại . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('phoneNumber')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('email')}}</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input name="address" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ . . .">
                       <p class="help is-danger" style="color: red">{{ $errors->first('address')}}</p>
            </div>
            <div class="modal-footer">
                <a href="{{url('danh-sach-khach-hang')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button></a>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>

@endsection