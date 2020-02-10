<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    public function findAll(){
    	$findAll = DB::table('users')
    	->join('role','users.roleid','=','role.id')
    	->select('users.*','role.description')
        ->orderBy('users.id','desc')
        ->paginate(4);
    	$roles = DB::table('role')->get();
    	return view('admin/users/list',compact('findAll','roles'));
    }

    public function insertUser(Request $req){
        if ($req->roleName==0) {
            return back()->with('alertfail','Bạn chưa chọn quyền !');
        }else {
            $this->validate($req,[
            'userName'=>'required|min:3|unique:users,name',
            'fullName'=>'required',
            'email'=>'required|unique:users,email',
            'passWord'=>'required|min:4'
        ],[
            'userName.required'=>'Bạn chưa nhập tên đăng nhập!',
            'userName.min'=>'Tên đăng nhập phải ít nhất 3 ký tự!',
            'userName.unique'=>'Tên đăng nhập đã tồn tại !',
            'fullName.required'=>'Tên người dùng không được bỏ trống!',
            'email.required'=>'Bạn chưa nhập email!',
            'email.unique'=>'Email này đã tồn tại!',
            'passWord.required'=>'Bạn chưa nhập mật khẩu!',
            'passWord.min'=>'Mật khẩu phải ít nhất 4 ký tự!'
        ]);

        $insertUser = DB::table('users')
        ->insert([
            'fullname'=>$req->fullName,
            'name'=>$req->userName,
            'email'=>$req->email,
            'phonenumber'=>$req->phoneNumber,
            'address'=>$req->address,
            'password'=>bcrypt($req->passWord),
            'roleid'=>$req->roleName
        ]);
        $roles = DB::table('role')->get();
        return back()->with('alertinsert','Thêm thành công!');
        }
        
    }

    public function addUser(){
        $roles = DB::table('role')->get();
        return view('admin/users/insert',compact('roles'));
    }

    public function getUser($id){
        $getUser = DB::table('users')
        ->join('role','users.roleid','=','role.id')
        ->where('users.id',$id)
        ->select('users.*','role.description')
        ->get();

        $roles = DB::table('role')->get();

        return view('admin/users/update',compact('getUser','roles'));
    }

    public function postUser(Request $req, $id){

        $this->validate($req,[
            'userName'=>'required|min:3',
            'fullName'=>'required',
            'email'=>'required'
            // 'password'=>'required|min:4'
        ],[
            'userName.required'=>'Bạn chưa nhập tên đăng nhập!',
            'userName.min'=>'Tên đăng nhập phải ít nhất 3 ký tự!',
            'fullName.required'=>'Tên người dùng không được bỏ trống!',
            'email.required'=>'Bạn chưa nhập email!'
            // 'password.required'=>'Bạn chưa nhập mật khẩu!',
            // 'password.min'=>'Mật khẩu phải ít nhất 4 ký tự!'
        ]);

        $postUser = DB::table('users')
        ->where('users.id',$id)
        ->update([
            'fullname'=>$req->fullName,
            'name'=>$req->userName,
            'email'=>$req->email,
            'phonenumber'=>$req->phoneNumber,
            'address'=>$req->address,
            // 'password'=>bcrypt($req->password),
            'roleid'=>$req->roleName
        ]);

        return back()->with('alertupdate','Thay đổi thành công!');
    }

    public function deleteUser($id){
        $deleteUser = DB::table('users')
        ->where('id',$id)
        ->delete();

        return back()->with('alert','Xóa thành công !');
    }

    public function getLogin(){
    	return view('login');
    }

    public function postLogin(Request $req){
    	if (Auth::attempt([
    		'name'=>$req->username,
    		'password'=>$req->password
    	])) {
            if(Auth::User()->roleid==1) {
                return redirect('quan-tri');
            }else if (Auth::User()->roleid==3) {
                return redirect('trang-chu');
            }   
    	}
        else if(is_null($req->username) && ($req->password)!=null) {
            return back()->with('alert','Vui lòng điền tên đăng nhập !');
        }else if(($req->username)!=null && is_null($req->password)) {
            return back()->with('alert','Vui lòng nhập mật khẩu !');
        }else if (is_null($req->username) && is_null($req->password)) {
            return back()->with('alert','Vui lòng nhập tên đăng nhập và mật khẩu !');
        }else
            return back()->with('alert','Sai tên tài khoản hoặc mật khẩu!');
    }

    public function getLogout(){
        if (Auth::User()->roleid==1) {
            Auth::logout();
            return redirect('dang-nhap');
        }else if (Auth::User()->roleid==3) {
            Auth::logout();
            return redirect('trang-chu');
        } 
    }

    public function getDangKy(){
        return view('Register');
    }

    public function postDangKy(Request $req){
        
        $this->validate($req,[
            'userName'=>'required|min:3|unique:users,name',
            'fullName'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:4'
        ],[
            'userName.required'=>'Bạn chưa nhập tên đăng nhập !',
            'userName.min'=>'Tên đăng nhập phải ít nhất 3 ký tự !',
            'userName.unique'=>'Tên đăng nhập đã tồn tại !',
            'fullName.required'=>'Tên người dùng không được bỏ trống !',
            'email.required'=>'Bạn chưa nhập email !',
            'email.unique'=>'Email này đã tồn tại !',
            'password.required'=>'Bạn chưa nhập mật khẩu !',
            'password.min'=>'Mật khẩu phải ít nhất 4 ký tự !'
        ]);

        $postDangKy = DB::table('users')
        ->insert([
            'name'=>$req->userName,
            'fullname'=>$req->fullName,
            'email'=>$req->email,
            'password'=>bcrypt($req->password),
            'roleid'=>3
        ]);

        return back()->with('alertsuccess','Bạn đã đăng ký thành công!');
    }
}
