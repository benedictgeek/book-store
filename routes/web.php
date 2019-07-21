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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','indexController@index');
Route::match(['get','post'],'/reg-login','UserController@login');
Route::post('/user/register','UserController@register');
Route::get('/user-logout','UserController@logout');
Route::get('/books/{url}','BookController@listbook');
Route::get('/books','BookController@listbook');
Route::get('/book/{id}','BookController@book');
Route::post('/search','BookController@search');
Route::get('/writers','BookController@authors');
Route::get('/writer/{id}','BookController@author');

//pages

Route::match(['get','post'],'/contact-us','PagesController@contact');



Route::match(['get','post'],'/author/register','adminAuthorController@register');
Route::match(['get','post'],'/author','adminAuthorController@login');
Route::get('/author-logout','adminAuthorController@logout');

//for vue product page

Route::get('/get-author/{id}','BookController@getauthor');
Route::get('/get-book/{id}','BookController@getbook');
Route::get('/get-relpro','BookController@relpro');
Route::post('/add-cart','BookController@addCart');
Route::get('/get-cart','BookController@getCart');
Route::get('/clear-cart','BookController@clearCart');

//for vue wishlist-button

Route::match(['get','post'],'/wishlist','BookController@addWish');
Route::get('/clear-wish','BookController@clearWish');





//routes for authenticated user

Route::group(['middleware'=>['userLogin']], function(){
    Route::get('/paypal','BookController@paypal');
    Route::get('/get-order','BookController@getorder');
    Route::get('/user-account','UserController@account');

    //ratings route
    Route::post('/rating','BookController@rate');
    Route::get('/rating/{id}','BookController@getrate');
    
    //vue cart page
    Route::post('/pay','BookController@checkout');
    Route::get('/cart','BookController@cart');
    Route::get('/inc-qty/{id}','BookController@updateqty');
    Route::get('/red-qty/{id}','BookController@redqty');
    Route::get('/del-item/{id}','BookController@delitem');
    Route::post('/put-qty','BookController@putqty');
    Route::get('/coupon/{code}','BookController@coupon');
    Route::get('/get-user','BookController@user');

    //for vue settings page

    Route::post('/update-pwd','UserController@upadatepwd');
    Route::post('/update-profile','UserController@upadateprofile');
    Route::get('/user-details/{id}','UserController@getprofile');


    Route::get('/thanks','UserController@thanks');
    Route::get('/error','UserController@error');

    //vue newsletter

    Route::post('/newsletter','UserController@newsletter');


});

Route::group(['middleware'=>['authorLogin']], function(){
    Route::get('/author/dashboard','adminAuthorController@dashboard');
    Route::get('/author/view-profile','adminAuthorController@profile');
    Route::match(['get','post'],'/author/edit-profile','adminAuthorController@editprofile');
    //category
    Route::match(['get','post'],'/admin/add-category','categoryController@addcategory');
    Route::get('/admin/view-categories','categoryController@viewcategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','categoryController@editcategory');
    Route::get('/admin/delete-category/{id}','categoryController@delcategory');
    //author books
    Route::match(['get','post'],'/author/add-book','BookController@addbook');
    Route::match(['get','post'],'/author/edit-book/{id}','BookController@editbook');
    Route::get('/admin/delete-book/{id}','BookController@delbook');
    Route::get('/author/my-books','BookController@mybooks');
    Route::match(['get','post'],'/author/add-attr/{id}','BookController@attributes');
    Route::match(['get','post'],'/author/edit-attr/{id}','BookController@editattr');
    //admin store books previleges
    Route::get('/admin/view-library','BookController@storebooks');
    Route::get('/admin/pending-library','BookController@pendingbooks');
    Route::get('/admin/rejected-library','BookController@rejectedbooks');
    Route::get('/admin/reject-book/{id}','BookController@rejectbook');
    Route::get('/admin/approve-book/{id}','BookController@approvebook');

    Route::get('/admin/featured-book/{id}','BookController@feature');
    Route::get('/admin/remove-feature/{id}','BookController@delfeature');

    //coupons
    Route::match(['get','post'],'/admin/add-coupon','BookController@addcoupon');

    //orders
    Route::get('/admin/view-orders','BookController@orders');
    Route::get('/admin/view-order/{id}','BookController@order');
    Route::get('/admin/order-invoice/{id}','BookController@invoice');




});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
