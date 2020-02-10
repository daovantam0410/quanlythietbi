<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function homePage(){
    	$homePage = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('subcategory', 'product.subcategory_id', '=', 'subcategory.id')
            ->select('product.id','product.productname','product.thumbnail','product.price')
            ->orderBy('product.id','desc')
            ->paginate(8);

        $categories = DB::table('category')
        ->get();

        $subcategories = DB::table('subcategory')
        ->where('category_id',)
        ->get();

        return view('web/home', compact('homePage','categories'));
    }

    public function searchs(Request $req){

        $tukhoa=$req->tukhoa;
        
        $searchs = DB::table('product')
        ->where('product.productname','like','%'.$req->tukhoa.'%')
        ->orWhere('product.price',$req->tukhoa)
        ->select('product.*')
        ->get();

        $categories = DB::table('category')->get();
        $subcategories = DB::table('subcategory')->get();

        return view('web/Search',compact('searchs','tukhoa','categories','subcategories'));
    }   

    public function detailsProduct($id){
        $detailsProduct = DB::table('product')
        ->where('id',$id)
        ->select('product.*')
        ->get();
        $categories = DB::table('category')->get();
        return view('web/DetailsProduct',compact('detailsProduct','categories'));
    }

    public function listProductOnSubCate($id){
        $listProductOnSubCate = DB::table('product')
        ->join('subcategory','product.subcategory_id','=','subcategory.id')
        ->where('subcategory.id',$id)
        ->select('product.*')
        ->get();
        $categories = DB::table('category')->get();

        return view('web/ListProductOnSubCategory',compact('listProductOnSubCate','categories'));
    }

    // public function getDetailsBill(){
    //     $getDetailsBill = DB::table('bill')
    //     ->join('users','bill.user_id','=','users.id')
    //     ->join('product','bill.product_id','=','product.id')
    //     ->select('bill.*','product.*','users.*')
    //     ->get();

    //     $listProductOnSubCate = DB::table('product')
    //     ->join('subcategory','product.subcategory_id','=','subcategory.id')
    //     ->where('subcategory.id',$id)
    //     ->select('product.*')
    //     ->get();

    //     $categories = DB::table('category')->get();
    //     return view('web/Bill',compact('categories','getDetailsBill','listProductOnSubCate'));
    // }

    // public function postDetailsBill(Request $req){
    //     $postDetailsBill = DB::table('bill') 
    // }

    public function about(){
        $categories = DB::table('category')->get();
        return view('web/about',compact('categories'));
    }

    public function postCheckout(Request $req){

    }
    
}
