<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('HomeController@index');
Route::get('/menu', 'HomeController@menu')->name('HomeController@menu');
Route::get('/mission/new', 'MissionController@mission_new')->name('MissionController@mission_new');
Route::post('/mission/new', 'MissionController@mission_submit')->name('mission_submit');
Route::get('/mission/view/{id}', 'MissionController@viewMission');
Route::get('/customer', 'DriverController@customer')->name('customer');
Route::get('/bill', 'MissionController@createBill');
Route::post('/saveBill', 'MissionController@saveBill');

Route::get('/invoices/{id}', 'MissionController@listInvoices');
Route::get('/dekra/bill/{id}', 'MissionController@showBill');


Route::get('/dekra/new', 'MissionController@new')->name('MissionController@new');
Route::post('/dekra/new', 'MissionController@submit')->name('MissionController@submit');
Route::get('/dekra/view', 'MissionController@viewMissions');
Route::get('/dekra/drivers', 'DriverController@driver')->name('DriverController@drivers.index');
Route::post('/dekra/drivers', 'DriverController@submit');
Route::get('/dekra/drivers/{id}', 'DriverController@driverDelete');
Route::get('/dekra/new_customer', 'DriverController@newCustomer');
Route::get('/dekra/new_customer/{id}', 'DriverController@editCustomer');
Route::post('/dekra/save_customer', 'DriverController@saveCustomer');
Route::get('/uploadfile','UploadFileController@index') ;
Route::post('/uploadfile','UploadFileController@showUploadFile');
Route::get('/config','HomeController@config');
Route::post('/config','HomeController@configSafe');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
