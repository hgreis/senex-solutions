<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('HomeController@index');
Route::get('/menu', 'HomeController@menu')->name('HomeController@menu');
Route::get('/menu_invoice', 'HomeController@menu_invoice')->name('HomeController@menu_invoice');
Route::get('/menu_config', 'HomeController@menu_config')->name('HomeController@menu_config');
Route::get('/mission/new', 'MissionController@mission_new')->name('MissionController@mission_new');
Route::post('/mission/new', 'MissionController@mission_submit')->name('mission_submit');
Route::get('/mission/view', 'MissionController@viewMissions')->name('viewMissions');
Route::get('/mission/view/{id}', 'MissionController@viewMission');
Route::get('/mission/viewNoDriver', 'MissionController@viewNoDriver')->name('viewNoDriver');
Route::get('/mission_overview/{id}', 'MissionController@overview')->name('overview');
Route::get('/customer', 'DriverController@customer')->name('customer');
Route::get('/bill', 'MissionController@createBill');
Route::post('/saveBill', 'MissionController@saveBill');
Route::get('/invoices/{id}', 'MissionController@listInvoices');
Route::get('/invoicesPaid/{id}', 'MissionController@paidInvoices');
Route::get('/bill/{id}', 'MissionController@showBill');
Route::get('/mission/viewNoDeliveryNote', 'MissionController@viewNoDeliveryNote')->name('viewNoDeliveryNote');
Route::get('/payBill/{id}', 'BillController@payBill')->name('payBill');
Route::get('/credits/{company}', 'CreditController@listForCredits')->name('listForCredits');
Route::post('/saveCredit', 'CreditController@saveCredit')->name('saveCredit');
Route::get('/listCredits/{company}', 'CreditController@listCredits')->name('listCredits');
Route::get('/payCredits/{company}', 'CreditController@payCredits')->name('payCredits');
Route::get('/payCredit/{id}', 'CreditController@payCredit')->name('payCredit');
Route::get('/listing', 'ListingController@listForListings');
Route::post('/listingSave', 'ListingController@listingSave')->name('listingSave');
Route::get('/listings', 'ListingController@listListings');
Route::get('/drivers/{id}', 'DriverController@edit');
Route::get('/drivers', 'DriverController@new')->name('newDriver');
Route::get('/drivers/{id}/delete', 'DriverController@driverDelete')->name('deleteDriver');
Route::post('/drivers', 'DriverController@submit');


Route::get('/unpaidMissions/{company}', 'MissionController@unpaidMissions');



Route::get('/dekra/new', 'MissionController@new')->name('MissionController@new');
Route::post('/dekra/new', 'MissionController@submit')->name('MissionController@submit');
Route::get('/dekra/new_customer', 'DriverController@newCustomer');
Route::get('/dekra/new_customer/{id}', 'DriverController@editCustomer');
Route::post('/dekra/save_customer', 'DriverController@saveCustomer');
Route::get('/uploadfile','UploadFileController@index') ;
Route::post('/uploadfile','UploadFileController@showUploadFile');
Route::get('/config','HomeController@config');
Route::post('/config','HomeController@configSafe');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
