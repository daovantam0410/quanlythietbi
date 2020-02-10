<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function findAll()
    {
        $findAll = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('subcategory', 'product.subcategory_id', '=', 'subcategory.id')
            ->select('product.id','product.series','product.productname','product.thumbnail','product.status',
                'category.categoryname', 'subcategory.subcategoryname')
            ->orderBy('product.id','desc')
            ->paginate(4);
        $categories = DB::table('category')->get();
        $subcategories = DB::table('subcategory')->get();
        return view('admin/product/list', compact('findAll', 'categories', 'subcategories'));
    }

    public function insertProduct(Request $req)
    {

        if ($req->tenDanhMuc==0 || $req->tenHang==0) {
            return back()->with('alertfail','Bạn chưa chọn tên danh mục và tên hãng !');
        }else {
            $this->validate($req,[
            'maSanPham'=>'required|unique:product,series',
            // 'tenSanPham'=>'required',
            // 'thongSoKyThuat'=>'required',
            // 'noiDung'=>'required',
            'gia'=>'min:0'
            // 'soLuong'=>'min:0',
            // 'tinhTrang'=>'boolean',
            // 'tenDanhMuc'=>'required',
            // 'tenHang'=>'required',
            ],[
            'maSanPham.required'=>'Bạn chưa nhập mã sản phẩm !',
            'maSanPham.unique'=>'Mã sản phẩm đã tồn tại !',
            // 'tenSanPham.required'=>'Bạn chưa nhập tên sản phẩm !',
            // 'gia.required'=>'Bạn chưa nhập giá tiền !',
            'gia.min'=>'Giá tiền phải lớn hơn 0 !'
            // 'soLuong.min'=>'Số lượng phải lớn hơn 0 !',
            // 'tinhTrang.boolean'=>'Chỉ được phép nhập 0 hoặc 1 !',
            // 'tenDanhMuc.required'=>'Bạn chưa chọn tên danh mục !',
            // 'tenHang.required'=>'Bạn chưa chọn hãng cho sản phẩm !'
        ]);

        if ($req->hasFile('anh')) {
            $img = $req->file('anh'); // lấy ra file ảnh
            $extends = $img->getClientOriginalExtension(); // lấy ra định dạng đuôi ảnh
            if($extends != 'jpg' && $extends != 'JPG' && $extends != 'jpeg'&&
                $extends != 'JPEG'&& $extends != 'png' && $extends != 'PNG'){
                return back()->with('alert','Không đúng định dạng!');
            }
            $imgname = rand()."_".$img->getClientOriginalName(); // lấy tên ảnh
            $insertProduct = DB::table('product')
                ->insert([
                    'series' => $req->maSanPham,
                    'productname' => $req->tenSanPham,
                    'thumbnail' => $imgname,
                    'specification' => $req->thongSoKyThuat,
                    'content' => $req->noiDung,
                    'price' => $req->gia,
                    // 'quantity'=>$req->soLuong,
                    'status' => $req->trangThai,
                    'category_id' => $req->tenDanhMuc,
                    'subcategory_id' => $req->tenHang
                ]);
            $img->move('upload',$imgname); // lưu ảnh lên server
            $categories = DB::table('category')->get();
            $subcategories = DB::table('subcategory')->get();

            return back()->with('alertinsert','Thêm thành công!');
        }else{
            $insertProduct = DB::table('product')
                ->insert([
                    'series' => $req->maSanPham,
                    'productname' => $req->tenSanPham,
                    'specification' => $req->thongSoKyThuat,
                    'content' => $req->noiDung,
                    'price' => $req->gia,
                    // 'quantity'=>$req->soLuong,
                    'status' => $req->trangThai,
                    'category_id' => $req->tenDanhMuc,
                    'subcategory_id' => $req->tenHang
                ]);
            $categories = DB::table('category')->get();
            $subcategories = DB::table('subcategory')->get();

            return back()->with('alertinsert','Thêm thành công!');
        }
    }
}

    public function addproduct()
    {
        $categories = DB::table('category')->get();
        $subcategories = DB::table('subcategory')->get();
        return view('admin/product/insert',compact('categories','subcategories'));
    }


    public function getProduct($id)
    {
        $getProduct = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('subcategory', 'product.subcategory_id', '=', 'subcategory.id')
            ->where('product.id', $id)
            ->select('product.*', 'category.categoryname', 'subcategory.subcategoryname')
            ->get();
        $categories = DB::table('category')->get();
        $subcategories = DB::table('subcategory')->get();
        return view('admin/product/update', compact('getProduct', 'categories', 'subcategories'));
    }

    public function postproduct(Request $req, $id){

        $this->validate($req,[
            'maSanPham'=>'required',
            // 'tenSanPham'=>'required',
            // 'thongSoKyThuat'=>'required',
            // 'noiDung'=>'required',
            'gia'=>'required|min:0',
            'soLuong'=>'min:0',
            // 'tinhTrang'=>'boolean',
            // 'tenDanhMuc'=>'required',
            // 'tenHang'=>'required',
        ],[
            'maSanPham.required'=>'Bạn chưa nhập mã sản phẩm !',
            // 'tenSanPham.required'=>'Bạn chưa nhập tên sản phẩm !',
            'gia.required'=>'Bạn chưa nhập giá tiền !',
            'gia.min'=>'Giá tiền phải lớn hơn 0 !',
            // 'soLuong.min'=>'Số lượng phải lớn hơn 0 !',
            // 'tinhTrang.boolean'=>'Chỉ được phép nhập 0 hoặc 1 !',
            // 'tenDanhMuc.required'=>'Bạn chưa chọn tên danh mục !',
            // 'tenHang.required'=>'Bạn chưa chọn hãng cho sản phẩm !'
        ]);
        
        if ($req->hasFile('anh')) {
            $img = $req->file('anh'); // lấy ra file ảnh
            $extends = $img->getClientOriginalExtension(); // lấy ra định dạng đuôi ảnh
            if($extends != 'jpg' && $extends != 'JPG' && $extends != 'jpeg'&&
                $extends != 'JPEG'&& $extends != 'png' && $extends != 'PNG'){
                return back()->with('alert','Không đúng định dạng!');
            }
            $imgname = rand()."_".$img->getClientOriginalName(); // lấy tên ảnh
            $getImg=DB::table('product')->where('product.id',$id)->get();
            if (is_null($getImg[0]->thumbnail)) {
                $postproduct = DB::table('product')
                ->where('id',$id)
                    ->update([
                    'series' => $req->maSanPham,
                    'productname' => $req->tenSanPham,
                    'thumbnail' => $imgname,
                    'specification' => $req->thongSoKyThuat,
                    'content' => $req->noiDung,
                    'price' => $req->gia,
                    // 'quantity'=>$req->soLuong,
                    'status' => $req->tinhTrang,
                    'category_id' => $req->tenDanhMuc,
                    'subcategory_id' => $req->tenHang
                ]);
                $img->move('upload',$imgname);
                return back()->with('alertupdate','Thay đổi thành công!');
            }
            unlink('upload/'.$getImg[0]->thumbnail);
            $postproduct = DB::table('product')
            ->where('id',$id)
            ->update([
                'series' => $req->maSanPham,
                'productname' => $req->tenSanPham,
                'thumbnail' => $imgname,
                'specification' => $req->thongSoKyThuat,
                'content' => $req->noiDung,
                'price' => $req->gia,
                // 'quantity'=>$req->soLuong,
                'status' => $req->tinhTrang,
                'category_id' => $req->tenDanhMuc,
                'subcategory_id' => $req->tenHang
            ]);
            $img->move('upload',$imgname);
            return back()->with('alertupdate','Thay đổi thành công!');
        }else{
            $postproduct = DB::table('product')
            ->where('id',$id)
            ->update([
                'series' => $req->maSanPham,
                'productname' => $req->tenSanPham,
                'specification' => $req->thongSoKyThuat,
                'content' => $req->noiDung,
                'price' => $req->gia,
                // 'quantity'=>$req->soLuong,
                'status' => $req->tinhTrang,
                'category_id' => $req->tenDanhMuc,
                'subcategory_id' => $req->tenHang
            ]);
            return back()->with('alertupdate','Thay đổi thành công!');
        }
    }

    public function deleteProduct($id){
        $deleteProduct = DB::table('product')
            ->where('id',$id)
            ->delete();
        return back()->with('alertdelete','Xóa thành công !');
    }
}
