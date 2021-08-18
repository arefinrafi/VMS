<?php

use Illuminate\Support\Facades\Route;



//HOME Pages Routes
Route::get('/','IndexController@index');

Route::get('/search-vehicles','VehiclesController@searchVehicles');

//Category Listing Page
Route::get('/vehicles/{url}','VehiclesController@Vehicles');

//Vehicle detail page
Route::get('/vehicle/{url}','VehiclesController@Vehicle');

Route::get('/booking/{id}','VehiclesController@booking');
Route::post('/booking','VehiclesController@bookingConfirm');

//Vehicle Price Range

// Route::post('/PriceRange','IndexController@PriceRange');
Route::get('/PriceRange1','VehiclesController@PriceRange1');
Route::get('/PriceRange2','VehiclesController@PriceRange2');
Route::get('/PriceRange3','VehiclesController@PriceRange3');
Route::get('/PriceRange4','VehiclesController@PriceRange4');
Route::get('/PriceRange5','VehiclesController@PriceRange5');

//Authentication Routes 
Route::get('/signin','AdminController@signin');
Route::get('/signup','AdminController@signup');
Route::post('/save_user','AdminController@save_user');
Route::post('/login_user','AdminController@login_user');
Route::get('/logout','AdminController@logout');

//Admin Panel Routes and Middleware Starts 
Route::group(['middleware' => 'checkloggedin'], function(){
Route::get('/backend/dashboard','AdminController@dashboard');
// Route::get('/backend/viewadmins','AdminController@viewadmins');

// Categoirs Routes(Admin)
Route::match(['get','post'],'/backend/add-category','CategoryController@addCategory');
Route::match(['get','post'],'/backend/edit-category/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/backend/delete-category/{id}','CategoryController@deleteCategory');
Route::get('/backend/view-categories','CategoryController@viewcategories');

// Vehicles Routes(Admin)
Route::match(['get','post'],'/backend/add-vehicle','VehiclesController@addVehicle'); 
Route::match(['get','post'],'/backend/edit-vehicle/{id}','VehiclesController@editVehicle');
Route::match(['get','post'],'/backend/delete-vehicle/{id}','VehiclesController@deleteVehicle');
Route::match(['get','post'],'/backend/add-images/{id}','VehiclesController@addImages');
Route::get('/backend/delete-alt-image/{id}','VehiclesController@deleteAltImage');
Route::get('/backend/view-vehicles','VehiclesController@viewVehicles');

Route::group(['middleware' => 'checkadmins'], function($name){
 
//view admins Route
Route::get('/backend/view-admins','AdminController@viewAdmins');
//add admin Route
Route::match(['get','post'],'/backend/add-admin','AdminController@addAdmin');
//edit admin Route
Route::match(['get','post'],'/backend/edit-admin/{id}','AdminController@editAdmin');
//delete admin Route
Route::match(['get','post'],'/backend/delete-admin/{id}','AdminController@deleteAdmin');

});
Route::get('/backend/profit','AdminController@viewProfit');



});
//User Signin page
Route::get('/usersignin','IndexController@usersignin');