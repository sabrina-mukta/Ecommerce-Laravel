<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainHome;
use App\Http\Controllers\adminHome;
use App\Http\Controllers\adminBrand;
use App\Http\Controllers\addminUser;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\ordersController;

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

//For user interface
Route::get('/',[mainHome::class,'home']);
Route::get('/contact',[mainHome::class,'contact']);








//For admin interface
Route::get('/adminpanel',[adminHome::class,'addminPage']);
Route::get('/login',[adminHome::class,'addminLogin']);
Route::get('/brand',[adminBrand::class,'addBrand']);
Route::get('/deleteBand/{id}',[adminBrand::class,'deleteBand']);
Route::post('/brandInsert',[adminBrand::class,'brandInsert']);
Route::post('/brandUpdate',[adminBrand::class,'brandUpdate']);




//For adminUser Controller
Route::get('/adduser',[addminUser::class,'adduser']);
Route::post('/userInsert',[addminUser::class,'userInsert']);
Route::get('/deleteUser/{id}',[addminUser::class,'deleteUser']);

//For login
Route::post('/loginUser',[addminUser::class,'loginUser']);
Route::get('/logout',[addminUser::class,'logout']);

// User Image

Route::get('/changeimage',[addminUser::class,'changeimage']);
//User Profile
Route::get('/profile',[addminUser::class,'profile']);


Route::get('/userPassChnage',[addminUser::class,'userPassChnage']);

Route::post('/passwordChange',[addminUser::class,'passwordChange']);


Route::post('/imageUpload',[addminUser::class,'imageUpload']);

Route::post('/userUpdate',[addminUser::class,'userUpdate']);

Route::get('/userprofileuniqUpdateshow/{id}',[addminUser::class,'userprofileuniqUpdateshow']);
Route::post('/userprofileuniqUpdate',[addminUser::class,'userprofileuniqUpdate']);


// For category

Route::get('/categoryadd',[categoryController::class,'categoryadd']);
Route::post('/addCategory',[categoryController::class,'addCategory']);
Route::get('/deleteCategory/{id}',[categoryController::class,'deleteCategory']);
Route::get('/categoryUpdateShow/{id}',[categoryController::class,'categoryUpdateShow']);
Route::post('/categorydataupdate',[categoryController::class,'categorydataupdate']);


// For Product

Route::get('/productadd',[productController::class,'productadd']);
Route::post('/addProduct',[productController::class,'addProduct']);
Route::get('/productlist',[productController::class,'productlist']);
Route::get('/deleteProduct/{id}',[productController::class,'deleteProduct']);
Route::get('/shoping',[productController::class,'shopingPage']);
Route::get('/productview/{id}',[productController::class,'productview']);
Route::get('/customerReg',[productController::class,'customerReg']);


Route::get('/category/{id}',[productController::class,'category']);


Route::get('/categorywishData',[productController::class,'categorywishData']);


Route::get('/brandPro',[productController::class,'brand']);
Route::post('/search',[productController::class,'search']);


Route::post('/buyproduct',[productController::class,'buyproduct']);
Route::get('/porductupdate/{id}',[productController::class,'porductupdate']);
Route::post('/updateProduct',[productController::class,'updateProduct']);


//For cart

Route::get('/cart',[cartController::class,'cart']);
Route::post('/cartupdate',[cartController::class,'cartupdate']);

Route::get('/cartDelete/{id}',[cartController::class,'cartDelete']);


// For customerController 

Route::post('/customerInsert/',[customerController::class,'customerInsert']);


Route::post('/loginCustomer/',[customerController::class,'loginCustomer']);
Route::get('/customerLogOut/',[customerController::class,'customerLogOut']);
Route::get('/customerProfile/',[customerController::class,'customerProfile']);
Route::get('/payment/',[customerController::class,'payment']);
Route::get('/offlinepayment/',[customerController::class,'offlinepayment']);
Route::get('/customerUpdateData/',[customerController::class,'customerUpdateData']);
Route::post('/customerUpdate/',[customerController::class,'customerUpdate']);
Route::get('/customerPasswordChange/',[customerController::class,'customerPasswordChange']);
Route::post('/passChange/',[customerController::class,'passChange']);
Route::get('/customerlist',[customerController::class,'customerlist']);
Route::get('/deleteCustomer/{id}',[customerController::class,'deleteCustomer']);






// For feedbackController

Route::post('/messageSent/',[feedbackController::class,'messageSent']);
Route::get('/inbox/',[feedbackController::class,'inbox']);



// For ordersController

Route::get('/confirmorder/',[ordersController::class,'confirmorder']);
Route::get('/paymentSuccessfully/',[ordersController::class,'paymentSuccessfully']);
Route::get('/orderDelete/{id}',[ordersController::class,'orderDelete']);
Route::get('/orderlist/',[ordersController::class,'orderlist']);
Route::get('/orderview/{id}',[ordersController::class,'orderview']);
Route::get('/orderShifted/{id}',[ordersController::class,'orderShifted']);
Route::get('/ordercomlist',[ordersController::class,'ordercomlist']);
Route::get('/ordercomview/{id}',[ordersController::class,'ordercomview']);
Route::get('/ordercompletelist',[ordersController::class,'ordercompletelist']);
Route::get('/orderCompleted/{id}',[ordersController::class,'orderCompleted']);
Route::get('/confirmComplteorder/{id}',[ordersController::class,'confirmComplteorder']);
Route::get('/reportbytoday',[ordersController::class,'reportbytoday']);
Route::get('/reportbydatewish',[ordersController::class,'reportbydatewish']);
Route::get('/reportbydaterange',[ordersController::class,'reportbydaterange']);

