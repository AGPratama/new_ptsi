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
    return redirect('admin');
});
Route::get('/admin/tender/step2?id={$id}', 'AdminTenderController@getStep2')->name('getStep2AddTender');
Route::get('/admin/tender/step3?id={$id}', 'AdminTenderController@getStep3')->name('getStep3AddTender');
Route::get('/admin/syarat_kualifikasi/cetak/{$id}', 'AdminSyaratKualifikasiController@cetak')->name('cetakDokumen');