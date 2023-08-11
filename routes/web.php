<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\LoginFormController;

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

/**AUTH */
//Route::get('loginform', [ 'as' => 'loginform', 'uses' => 'SocietyController@index']);
Route::get('/', [LoginFormController::class, 'index']);
Route::get('login', [LoginFormController::class, 'index']);
Route::post('checklogin', [LoginFormController::class, 'checklogin']);
Route::get('logout', [LoginFormController::class, 'logout']);

/**SocietyController */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/society/dashboard', [SocietyController::class, 'dashboard']);
    Route::get('/society/loan/issue', [SocietyController::class, 'issuelist']);
    Route::get('/society/loan/issue/add', [SocietyController::class, 'issueadd']);
    Route::post('/society/loan/issue/store', [SocietyController::class, 'issuestore']);

    Route::get('/society/loan/collection', [SocietyController::class, 'collectionlist']);
    Route::get('/society/loan/collection/add', [SocietyController::class, 'collectionadd']);
    Route::post('/society/loan/collection/store', [SocietyController::class, 'collectionstore']);

    Route::get('/society/loan/annual', [SocietyController::class, 'annuallist']);
    Route::get('/society/loan/annual/add', [SocietyController::class, 'annualadd']);
    Route::post('/society/loan/annual/store', [SocietyController::class, 'annualstore']);

    Route::get('/society/loan/overallot', [SocietyController::class, 'overallotlist']);
    Route::get('/society/loan/overallot/add', [SocietyController::class, 'overallotadd']);
    Route::post('/society/loan/overallot/store', [SocietyController::class, 'overallotstore']);

    Route::get('/society/purchase/fertilizer', [SocietyController::class, 'fertilizerlist']);
    Route::get('/society/purchase/fertilizer/add', [SocietyController::class, 'fertilizeradd']);
    Route::post('/society/purchase/fertilizer/store', [SocietyController::class, 'fertilizerstore']);

    Route::get('/society/purchase/pharmacy', [SocietyController::class, 'pharmacylist']);
    Route::get('/society/purchase/pharmacy/add', [SocietyController::class, 'pharmacyadd']);
    Route::post('/society/purchase/pharmacy/store', [SocietyController::class, 'pharmacystore']);

    Route::get('/society/purchase/ffo', [SocietyController::class, 'ffolist']);
    Route::get('/society/purchase/ffo/add', [SocietyController::class, 'ffoadd']);
    Route::post('/society/purchase/ffo/store', [SocietyController::class, 'ffostore']);


});



Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/clear-config', function() {
    $exitCode = Artisan::call('config:clear');
    // return what you want
});
Route::get('/clear-optimize', function() {
    $exitCode = Artisan::call('optimize');
    // return what you want
});
Route::get('/clear-route', function() {
    $exitCode = Artisan::call('config:route');
    // return what you want
});
