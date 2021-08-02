<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App;
use App\BillModel;
use App\DetailsBillProductModel;

class CartController extends Controller
{
	public function getCart(){
		$getCart = Cart::getContent();
		$total = Cart::getTotal();
		$categories =DB::table('category')->get();
		return view('web/Cart',compact('categories','getCart','total'));
	}

	public function checkout(){
		$customer = DB::table('users')->get();
		$checkout = Cart::getContent();
		$total = Cart::getTotal();
		$categories =DB::table('category')->get();

		return view('web/Checkout',compact('categories','checkout','total'));
	}

	public function postCheckout(Request $req){

		$this->validate($req,[
            'address'=>'required',
            'phoneNumber'=>'required'
        ],[
            'address.required'=>'Bạn chưa nhập địa chỉ!',
            'phoneNumber.required'=>'Bạn chưa nhập số điện thoại!',
        ]);

		$bill=new BillModel;
		$bill->fullname = $req->fullName;
		$bill->phonenumber = $req->phoneNumber;
		$bill->email = $req->email;
		$bill->address = $req->address;
		$bill->total_price = Cart::getTotal(0,"","");
		// $bill->status = 0;
		$bill->status = 1;
		$bill->save();
		foreach (Cart::getContent() as $product) {
			$prd = new DetailsBillProductModel;
			$prd->productname = $product->name;
			$prd->thumbnail = $product->attributes->images;
			$prd->price = round($product->price,0);
			$prd->quantity = $product->quantity;
			$prd->bill_id = $bill->id;
			$prd->save();
		}
		return redirect('hoan-tat-thanh-toan');
		// echo "Đã thêm đơn hàng thành công !";
	}

	public function complete(){
		// $complete = DB::table('bill')
		// ->join('bill_product','bill.id','=','bill_product.bill_id')
		// ->where('bill_id',$bill_id)
		// ->select('bill.*','bill_product.*')
		// ->get();
		// dd($complete);
		$categories =DB::table('category')->get();
		return view('web/Complete',compact('categories'));
	}

	public function addCart($id)
	{
		$sql = App\productModel::where('id',$id)->select('id','productname','price','quantity','thumbnail')->get();
		$cart = Cart::add(array(
			'id' => $sql[0]->id,
			'name' => $sql[0]->productname,
			'price' => $sql[0]->price,
			'quantity' => 1,
			'attributes' => array('images' => $sql[0]->thumbnail),
		));
	}

	public function updateCart($id,$qty){
		Cart::update($id, array(
	     	'quantity' => array(
	     	'relative' => false,
	      	'value' => $qty
	  		)
		));
	}

	public function deleteCart($id){
		$cart = Cart::remove($id);
		return back();
	}


}
