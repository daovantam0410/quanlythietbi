<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function findAll(){
        $findAll = DB::table('category')
        ->orderBy('category.id','desc')
        ->paginate(4);
        return view('admin/category/list',compact('findAll'));
    }

    public function insertCategory(Request $req){
        $this->validate($req,[
            'categoryName'=>'required|unique:category,categoryname'
        ],[
            'categoryName.required'=>'Bạn chưa nhập tiêu đề !',
            'categoryName.unique'=>'Tiêu đề này đã tồn tại !'
        ]);

        $insertCategory = DB::table('category')->insert([
           'categoryname' => $req->categoryName
            ]);
        return back()->with('alertinsert','Thêm thành công !');
    }

    public function getCategory($id){
        $getCategory = DB::table('category')
            ->where('id',$id)
            ->get();
        return view('admin/category/update',compact('getCategory'));
    }

    public function postCategory(Request $req, $id){
        $this->validate($req,[
            'categoryName'=>'required'
        ],[
            'categoryName.required'=>'Bạn chưa nhập tên tiêu đề mới!',
        ]);

        $postCategory = DB::table('category')
            ->where('id',$id)
            ->update([
                'categoryname'=>$req->categoryName
            ]);
        return back()->with('alertupdate','Thay đổi thành công !');
    }

    public function deleteCategory($id){
        $deleteCategory = DB::table('category')->where('id',$id)->delete();
        return back()->with('alertdelete','Xóa thành công !');
    }
}
