<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homeAdmin(){
    	return view('admin/home');
    }

    // public function searchs(Request $req){
    // 	$tukhoa=$req->tukhoa;

    // 	$searchs = DB::table('product')
    // 	->join('category','product.category_id','=','category.id')
    // 	->join('subcategory','product.subcategory_id','=','subcategory.id')
    // 	->where('product.series','like','%'.$req->tukhoa.'%')
    // 	->orWhere('product.productname','like','%'.$req->tukhoa.'%')
    // 	->orWhere('product.status',$req->tukhoa)
    // 	->orWhere('category.categoryname','like','%'.$req->tukhoa.'%')
    // 	->orWhere('subcategory.subcategoryname','like','%'.$req->tukhoa.'%')
    // 	->select('product.*','category.categoryname','subcategory.subcategoryname')
    // 	->get();

    // 	return view('admin/product/search',compact('searchs','tukhoa'));
    // }
}
