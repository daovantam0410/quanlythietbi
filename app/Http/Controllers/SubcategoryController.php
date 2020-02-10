<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SubcategoryController extends Controller
{
    public function findAll(){
        $findAll = DB::table('subcategory')
            ->join('category','subcategory.category_id','=','category.id')
            ->select('subcategory.*','category.categoryname')
            ->orderBy('subcategory.id','desc')
            ->paginate(4);
        $category = DB::table('category')->get();
        return view('admin/subcategory/list',compact('findAll','category'));
    }

    public function insertSubcate(Request $req){

        $this->validate($req,[
            'subCategory'=>'required|unique:subcategory,subcategoryname'
        ],[
            'subCategory.required'=>'Bạn chưa nhập tên hãng !',
            'subCategory.unique'=>'Tên hãng này đã tồn tại !'
        ]);

        $insertSubcate = DB::table('subcategory')
            ->insert([
                'subcategoryname'=>$req->subCategory,
                'category_id'=>$req->categoryId
            ]);
        return back()->with('alertinsert','Thêm thành công !');
    }

    public function getSubcate($id){
        $getSubcate = DB::table('subcategory')
            ->join('category','subcategory.category_id','=','category.id')
            ->where('subcategory.id',$id)
            ->select('subcategory.*','category.categoryname')
            ->get();
        $categories = DB::table('category')->get();
        return view('admin/subcategory/update',compact('getSubcate','categories'));
    }

    public function postSubcate(Request $req, $id){

        $this->validate($req,[
            'subCategory'=>'required'
        ],[
            'subCategory.required'=>'Bạn chưa nhập tên hãng mới!',
        ]);

        $postSubcate = DB::table('subcategory')
            ->where('id',$id)
            ->update([
                'subcategoryname'=>$req->subCategory,
                'category_id'=>$req->categoryId
            ]);
        return back()->with('alert','Thay đổi thành công !');
    }

    public function deleteSubcate($id){
        $deleteSubcate = DB::table('subcategory')
            ->where('id',$id)
            ->delete();
        return back()->with('alertdelete','Xóa thành công !');
    }
}
