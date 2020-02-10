<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::group(['prefix'=>'trang-chu'],function(){
// 	// Trang chủ
// 	route::get('','HomeController@homePage');
// });
// 
// Trang chủ
route::get('trang-chu','HomeController@homePage');

// Giới thiệu
route::get('gioi-thieu','HomeController@about');

// tìm kiếm
route::get('tim-kiem','HomeController@searchs');

// đơn đặt hàng
Route::post('dat-hang','HomeController@postCheckout');

// Hiển thị chi tiết sản phẩm
route::get('chi-tiet-san-pham/{id}','HomeController@detailsProduct');

// Danhh sách sản phẩm theo hãng
route::get('san-pham-theo-hang/{id}','HomeController@listProductOnSubCate');

// trang giỏ hàng
Route::get('gio-hang','CartController@getCart');

// trang thanh toán (checkout)
route::get('thanh-toan','CartController@checkout');
route::post('thanh-toan','CartController@postCheckout');

// trang hoàn tất thanh toán
Route::get('hoan-tat-thanh-toan','CartController@complete');

// Thêm giỏ hàng
Route::post('gio-hang/{id}','CartController@addCart');

// Sửa giỏ hàng
Route::GET('sua-gio-hang/{id}/{qty}','CartController@updateCart');

// Xóa giỏ hàng
Route::get('xoa-gio-hang/{id}','CartController@deleteCart');

// route::get('don-dat-hang','HomeController@getDetailsBill');
// route::get('don-dat-hang','HomeController@postDetailsBill')->name('addBill');

// REGISTER
route::get('dang-ky','UserController@getDangKy');
route::post('dang-ky','UserController@postDangKy')->name('dangky');

// LOGIN
route::get('dang-nhap','UserController@getLogin');
route::post('dang-nhap','UserController@postLogin')->name('login');

// LOGOUT
route::get('dang-xuat','UserController@getLogout');

Route::group([ 'middleware' => 'banhangMiddle' ] , function(){
// Route::group('',function(){
	// Trang chủ admin
	route::get('quan-tri','AdminController@homeAdmin');

	// Tìm kiếm trong trang admin
	// Route::get('admin/tim-kiem','AdminController@searchs');

	// findAll users
	route::get('listusers','UserController@findAll');

	// insert user
	route::post('adduser','UserController@insertUser')->name('adduser');

	route::get('them-thanh-vien','UserController@addUser');

	// update user
	route::get('updateuser/{id}','UserController@getUser');
	route::post('updateuser/{id}','UserController@postUser')->name('updateuser');

	// delete user
	route::get('deleteuser/{id}','UserController@deleteUser')->name('deleteuser');

	// findAll customer
	route::get('danh-sach-khach-hang','CustomerController@findAll');

	// insert customer
	route::get('them-khach-hang','CustomerController@toAddCustomer');
	route::post('them-khach-hang','CustomerController@insertCustomer')->name('addcustomer');

	// update customer
	Route::get('sua-thong-tin-khach-hang/{id}','CustomerController@getCustomer');
	Route::post('sua-thong-tin-khach-hang/{id}','CustomerController@postCustomer')->name('updatecustomer');

	// delete customer
	Route::get('xoa-khach-hang/{id}','CustomerController@deleteCustomer')->name('deletecustomer');

	// findAll role
	route::get('listroles','RoleController@findAll');

	//insert role
	route::post('addrole','RoleController@insertRole')->name('addrole');

	//update role
	route::get('updaterole/{id}','RoleController@getRole');
	route::post('updaterole/{id}','RoleController@postRole')->name('updaterole');

	//Delete role
	route::get('deleterole/{id}','RoleController@deleteRole')->name('deleterole');

	// findAll category
	route::get('listcategory', 'CategoryController@findAll');

	// insert category
	route::post('addcategory', 'CategoryController@insertCategory')->name('addcategory');

	// update category
	route::get('updatecategory/{id}', 'CategoryController@getCategory');
	route::post('updatecategory/{id}', 'CategoryController@postCategory')->name('updatecategory');

	// delete category
	route::get('deletecategory/{id}','CategoryController@deleteCategory')->name('deletecategory');

	// findAll subcategory
	route::get('listsub','SubcategoryController@findAll');

	// insert subcategory
	route::post('addsubcate','SubcategoryController@insertSubcate')->name('addsubcategory');

	// update subcategory
	route::get('updatesubcate/{id}','SubcategoryController@getSubcate');
	route::post('updatesubcate/{id}','SubcategoryController@postSubcate')->name('updatesubcategory');

	// delete subcategory
	route::get('deletesubcate/{id}','SubcategoryController@deleteSubcate')->name('deletesubcategory');

	// findAll product
	route::get('listproduct','ProductController@findAll');

	// insert product
	route::post('addproduct','ProductController@insertProduct')->name('addproduct');

	route::get('them-san-pham','ProductController@addproduct');

	// update product
	route::get('updateproduct/{id}','ProductController@getProduct');
	route::post('updateproduct/{id}','ProductController@postproduct')->name('updateproduct');

	// delete product
	route::get('deleteproduct/{id}','ProductController@deleteProduct')->name('deleteproduct');

	// danh sách đơn hàng chưa xử lý
	Route::get('danh-sach-don-hang-chua-xu-ly','OrderController@findOrderfails');

	// xóa đơn hàng chưa được xử lý
	// Route::get('xoa-don-hang-chua-xu-ly/{id}','OrderController@deleteOrder');

	// danh sách đơn hàng đã xử lý
	Route::get('danh-sach-don-hang-da-xu-ly','OrderController@findOrderSuccess');

	// chi tiết đơn hàng chưa xử lý
	Route::get('chi-tiet-don-hang-chua-xu-ly/{id}','OrderController@detailsOrderfails');

	Route::get('chi-tiet-trang-thai/{billId}','OrderController@checkStatus');

	// chi tiết đơn hàng đã xử lý
	Route::get('chi-tiet-don-hang-da-xu-ly/{id}','OrderController@detailsOrderSuccess');

	// Route::post('chi-tiet-don-hang-chua-xu-ly/{id}','OrderController@updateStatus');

	route::get('thong-ke-doanh-thu','ReportController@getReport');
});

