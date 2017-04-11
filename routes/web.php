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

/* Vishal Routes */

Auth::routes();

Route::get('/', function () {
    return view('vendors.edit-category');
});

Route::get('/shop',[
	'uses' => 'MakeItemController@home',
	'as'   => 'vendors.home'
]);

Route::get('/home',[
    'uses' => 'MakeItemController@index',
    'as' => 'getVendorHome'
]);

Route::get('/session',[
    'uses' => 'TestController@session',
    'as' => 'getSession'
]);

Route::post('/addItem',[
    'uses' => 'AjaxController@index',
    'as' => 'addItem'
]);

Route::post('/getUser',[
    'uses' => 'AjaxController@getUser',
    'as' => 'getUser'
]);

Route::post('/confirm',[
    'uses' => 'TestController@confirm',
    'as' => 'confirm'
]);

Route::get('/history',[
    'uses' => 'TestController@getHistory',
    'as' => 'getHistory'
]);

// Route::get('/admin/history',[
//     'uses' => 'TestController@getAdminHistory',
//     'as' => 'getAdminHistory'
// ]);

//Route::get('/create-discount',[
//    'uses' => 'MakeDiscountController@create',
//    'as' => 'getDiscount'
//]);
//
//Route::post('/store-discount',[
//    'uses' => 'MakeDiscountController@store',
//    'as'   => 'postDiscount'
//]);
//
//Route::get('/edit-discount/{id}',[
//    'uses' => 'MakeDiscountController@edit',
//    'as' => 'editDiscount'
//]);
//
//Route::get('/update-discount/{id}',[
//    'uses' => 'MakeDiscountController@edit',
//    'as' => 'editDiscount'
//]);
//
//Route::post('/delete-discount/{id}',[
//    'uses' => 'MakeDiscountController@destroy',
//    'as' => 'deleteDiscount'
//]);
//
//Route::get('/discount',[
//    'uses' => 'MakeDiscountController@index',
//    'as' => 'showDiscount'
//]);


/* Vishal Routes End */

Route::get('/', function () {
    return view('pages.index');
});



Route::group(['middleware' => 'entry'],function(){
	///Super Admin Routes
	

	Route::get('block/{buyer?}',['as'=>'buyers.block','uses'=>'BuyerFunController@block']);

	Route::get('logout', ['as'=>'customlogout','uses'=>'\App\Http\Controllers\Auth\LoginController@logout']);
	Route::get('getrfid',['uses'=>'OrgFunController@getRfid','as'=>'getrfid']);
	Route::post('getrfid',['uses'=>'OrgFunController@postGetRfid','as'=>'postgetrfid']);

	Route::get('profile',['uses'=>'UserProfileController@profile','as'=>'profile']);
	Route::post('profile',['uses'=>'UserProfileController@postprofile','as'=>'postprofile']);


	Route::get('test',['as'=>'test','uses'=>'TestController@test']);


	Route::resource('orgs', 'MakeOrgController');



	Route::resource('vendors', 'MakeVendorController');
    Route::resource('discounts', 'MakeDiscountController');


	Route::resource('buyers', 'MakeBuyerController');
	Route::resource('items', 'MakeItemController');

	Route::get('createwithfile',['as'=>'buyers.createwithfile','uses'=>'MakeBuyerController@createWithFile'])->middleware('can:create,App\Models\Buyer');
	Route::post('createwithfile',['as'=>'buyers.postcreatewithfile','uses'=>'MakeBuyerController@postCreateWithFile'])->middleware('can:create,App\Models\Buyer');



	Route::group(['middleware' => 'rolecheck:1'],function(){
		///Super Admin Routes
		
	});


	Route::group(['middleware' => 'role:2'],function(){
		///ORG Routes
		
	});

	Route::group(['middleware' => 'role:3'],function(){
		///Vendor Routes
		
	});



	Route::group(['middleware' => 'role:4'],function(){
		///User Routes
		
		

	});

});





