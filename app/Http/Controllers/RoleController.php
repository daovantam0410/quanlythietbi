<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
{
    public function findAll(){
    	$findAll = DB::table('role')->get();
    	return view('admin/role/list',compact('findAll'));
    }

    public function insertRole(Request $req){

        $this->validate($req,[
            'roleName'=>'required|unique:role,rolename',
            'description'=>'required|unique:role,description'
        ],[
            'roleName.required'=>'Bạn chưa nhập quyền hạn !',
            'roleName.unique'=>'Quyền hạn này đã tồn tại !',
            'description.required'=>'Bạn chưa nhập mô tả !',
            'description.unique'=>'Mô tả này đã tồn tại !',
        ]);

    	$insertRole = DB::table('role')
    	->insert([
    		'rolename'=>$req->roleName,
    		'description'=>$req->description
    	]);

    	return back()->with('alertinsert','Thêm thành công !');
    }

    public function getRole($id){
        $getRole = DB::table('role')
        ->where('role.id',$id)
        ->get();

        return view('admin/role/update',compact('getRole'));
    }

    public function postRole(Request $req, $id){

        $this->validate($req,[
            'roleName'=>'required',
            'description'=>'required'
        ],[
            'roleName.required'=>'Bạn chưa nhập quyền hạn mới !',
            'description.required'=>'Bạn chưa nhập mô tả mới !',
        ]);

        $postRole = DB::table('role')
        ->where('role.id',$id)
        ->update([
            'rolename'=>$req->roleName,
            'description'=>$req->description
        ]);

        return back()->with('alert','Thay đổi thành công !');
    }

    public function deleteRole($id){
        $deleteRole = DB::table('role')
        ->where('role.id',$id)
        ->delete();

        return back()->with('alertdelete','Xóa thành công !');
    }
}
