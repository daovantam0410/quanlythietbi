<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function findAll()
    {
    	$findAll = DB::table('customer')
        ->orderBy('customer.id','desc')
        ->get();
    	return view('admin/customer/list',compact('findAll'));
    }

    public function toAddCustomer(){
        return view('admin/customer/insert');
    }

    public function insertCustomer(Request $req){

        $this->validate($req,[
            'name'=>'required',
            'gender'=>'required',
            'phoneNumber'=>'required',
            'email'=>'required|unique:users,email',
            'address'=>'required'
        ],[
            'name.required'=>'Bạn chưa nhập tên khách hàng !',
            'gender.required'=>'Bạn chưa nhập giới tính !',
            'phoneNumber.required'=>'Bạn chưa nhập số điện thoại !',
            'email.required'=>'Bạn chưa nhập email!',
            'email.unique'=>'Email này đã tồn tại!',
            'address.required'=>'Bạn chưa nhập địa chỉ !'
        ]);

    	$insertCustomer = DB::table('customer')
    	->insert([
    		'name'=>$req->name,
    		'gender'=>$req->gender,
    		'phone_number'=>$req->phoneNumber,
    		'email'=>$req->email,
    		'address'=>$req->address
    	]);
    	return back()->with('alertinsert','Thêm khách hàng thành công !');
    }

    public function getCustomer($id){
        $getCustomer = DB::table('customer')
        ->where('customer.id',$id)
        ->select('customer.*')
        ->get();

        return view('admin/customer/update',compact('getCustomer'));
    }

    public function postCustomer(Request $req, $id){

        $this->validate($req,[
            'name'=>'required',
            'gender'=>'required',
            'phoneNumber'=>'required|min:10',
            'email'=>'required',
            'address'=>'required'
        ],[
            'name.required'=>'Bạn chưa nhập tên khách hàng !',
            'gender.required'=>'Bạn chưa nhập giới tính !',
            'phoneNumber.required'=>'Bạn chưa nhập số điện thoại !',
            'phoneNumber.min'=>'Số điện thoại tối đa 10 chữ số !',
            'email.required'=>'Bạn chưa nhập email!',
            'address.required'=>'Bạn chưa nhập địa chỉ !'
        ]);

        $postCustomer = DB::table('customer')
        ->where('id',$id)
        ->update([
            'name'=>$req->name,
            'gender'=>$req->gender,
            'phone_number'=>$req->phoneNumber,
            'email'=>$req->email,
            'address'=>$req->address
        ]);

        return back()->with('alertupdate','Thay đổi thông tin thành công!');
    }

    public function deleteCustomer($id){
        $deleteCustomer = DB::table('customer')
        ->where('id',$id)
        ->delete();

        return back()->with('alert','Xóa khách hàng thành công !');
    }
    
}
