<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Regions
Route::get("/regions", "RegionController@index")->name("regions");
Route::get("/region/add", "RegionController@add")->name("region.add");
Route::get("/region/{region}", "RegionController@edit")->name("region.edit");
Route::post("/region/add", "RegionController@add_submit")->name("region.add.submit");
Route::post("/region/{region}", "RegionController@edit_submit")->name("region.edit.submit");



Route::get("/gemeinden", "ParishController@index")->name("parishes");
Route::get("/gemeinde/add", "ParishController@add")->name("parish.add");
Route::get("/gemeinde/{parish}", "ParishController@edit")->name("parish.edit");
Route::post("/gemeinde/add", "ParishController@add_submit")->name("parish.add.submit");
Route::post("/gemeinde/{parish}", "ParishController@edit_submit")->name("parish.edit.submit");




Route::get("/sightseeing-spots", "SightseeingController@index")->name("sightseeingspots.index");
Route::get("/sightseeing-spot/add", "SightseeingController@add")->name("sightseeingspot.add");
Route::get("/sightseeing-spot/{sightseeingspot}", "SightseeingController@edit")->name("sightseeingspot.edit");
Route::post("/sightseeing-spot/add", "SightseeingController@add_submit")->name("sightseeingspot.add.submit");
Route::post("/sightseeing-spot/{sightseeingspot}", "SightseeingController@edit_submit")->name("sightseeingspot.edit.submit");
