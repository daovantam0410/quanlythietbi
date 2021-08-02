<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\DetailsBillProductModel;
use Carbon\carbon;

class OrderController extends Controller
{
    public function findOrderfails(){
        $findOrderfails = DB::table('bill')
        ->join('status','bill.status','=','status.id')
        ->where('status.id',1)
        ->select('bill.id','bill.fullname','bill.phonenumber','bill.created_at','status.nameStatus as status')
        ->get();
        // dd($findOrderfails);
    	return view('admin/cart/listfails',compact('findOrderfails'));
    }

    public function detailsOrderfails($id){
        $detailsOrderfails = DB::table('bill')
        ->join('bill_product','bill.id','=','bill_product.bill_id')
        ->where('bill.id',$id)
        ->select('bill.id as billId','bill.fullname','bill.address','bill.phonenumber','bill.email','bill.total_price','bill.note','bill_product.id as bill_product_id','bill_product.thumbnail','bill_product.productname','bill_product.price','bill_product.quantity','bill_product.bill_id')
        ->get();

    	return view('admin/cart/details_listfails',compact('detailsOrderfails'));
    }

    // public function deleteOrder($id){
    //     if ($deleteOrder = DB::table('bill')
    //         ->where('id',$id)
    //         ->delete()) 
    //     {
    //         $getProduct = DB::table('bill_product')->where('bill_id',$bill_id)->get();
    //         $deletebill_product = DB::table('bill_product')->where('bill_id',$bill_id)->delete();
    //         return back()->with('alertdelete','Xóa đơn hàng thành công!');
    //     }
    // }

    public function checkStatus($billId){
        // code cũ
       // DB::table('bill')->where('id',$billId)->update(['status' => 1,'updated_at'=>carbon::now()]);

       // code mới
       DB::table('bill')->where('id',$billId)->update(['status' => 2,'updated_at'=>carbon::now()]);
    }
    public function findOrderSuccess(){
    	// $findOrderSuccess = DB::table('bill')->where('status',1)
        $findOrderSuccess = DB::table('bill')
        ->join('status','bill.status','=','status.id')
        ->where('status.id',2)
        ->select('bill.id','bill.fullname','bill.phonenumber','bill.created_at','bill.updated_at','status.nameStatus as status')
        ->get();
        // dd($findOrderSuccess);
        return view('admin/cart/listsuccess',compact('findOrderSuccess'));
    }

    public function detailsOrderSuccess($id){
        $detailsOrderSuccess = DB::table('bill')
        ->join('bill_product','bill.id','=','bill_product.bill_id')
        ->where('bill.id',$id)
        ->select('bill.id as billId','bill.fullname','bill.address','bill.phonenumber','bill.email','bill.total_price','bill.note','bill_product.id as bill_product_id','bill_product.thumbnail','bill_product.productname','bill_product.price','bill_product.quantity','bill_product.bill_id')
        ->get();
    	return view('admin/cart/details_listsuccess',compact('detailsOrderSuccess'));
    }
}
