<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('master-syarat-kualifikasi', 'MasterSyaratKualifikasiController');
Route::apiResource('tender-syarat-kualifikasi', 'TenderSyaratKualifikasiController');
Route::apiResource('kelengkapan-syarat-kualifikasi', 'KelengkapanSyaratKualifikasiController');
Route::apiResource('enumeration', 'EnumerationController');
Route::apiResource('tender', 'TenderController');
Route::get('tender/send-notif-by-tender/{id}', 'TenderController@send_notif_by_tender')->name('send_notif_by_tender');
Route::get('tender/send-notif-by-verifikator/{id}', 'TenderController@send_notif_by_verifikator')->name('send_notif_by_verifikator');