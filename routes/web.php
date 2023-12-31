<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\SuperAdminController;

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
Route::get('/', [LoginFormController::class, 'index']);
Route::get('login', [ 'as' => 'login', 'uses' => 'LoginFormController@index']);
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

    Route::get('/society/deposit/annual', [SocietyController::class, 'depositannuallist']);
    Route::get('/society/deposit/annual/add', [SocietyController::class, 'depositannualadd']);
    Route::post('/society/deposit/annual/store', [SocietyController::class, 'depositannualstore']);

    Route::get('/society/deposit/list', [SocietyController::class, 'depositlist']);
    Route::get('/society/deposit/add', [SocietyController::class, 'depositadd']);
    Route::post('/society/deposit/store', [SocietyController::class, 'depositstore']);

    Route::get('/society/purchase/list', [SocietyController::class, 'purchaselist']);
    Route::get('/society/purchase/add', [SocietyController::class, 'purchaseadd']);
    Route::post('/society/purchase/store', [SocietyController::class, 'purchasestore']);

    //sales

    Route::get('/society/sale/list', [SocietyController::class, 'saleslist']);
    Route::get('/society/sale/add', [SocietyController::class, 'salesadd']);
    Route::post('/society/sale/store', [SocietyController::class, 'salesstore']);

    Route::get('/society/godown', [SocietyController::class, 'godownlist']);
    Route::get('/society/godown/add', [SocietyController::class, 'godownadd']);
    Route::post('/society/godown/store', [SocietyController::class, 'godownstore']);

    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard']);
    Route::get('/superadmin/loanreport', [SuperAdminController::class, 'loanreport']);
    Route::get('/superadmin/depositreport', [SuperAdminController::class, 'depositreport']);
    Route::get('/superadmin/purchasereport', [SuperAdminController::class, 'purchasereport']);
    Route::get('/superadmin/users', [SuperAdminController::class, 'userslist']);
    Route::get('/superadmin/user/add', [SuperAdminController::class, 'useradd']);
    Route::post('/superadmin/user/store', [SuperAdminController::class, 'userstore']);



    Route::post('/fetch/circle', [SuperAdminController::class, 'fetchcircle']);
    Route::post('/fetch/society', [SuperAdminController::class, 'fetchsociety']);
    Route::get('/superadmin/godownreport', [SuperAdminController::class, 'godownreport']);

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
