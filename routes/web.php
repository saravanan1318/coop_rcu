<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\DRController;
use App\Http\Controllers\JRController;
use App\Http\Controllers\MDController;

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
Route::get('login', [LoginFormController::class, 'index']);
Route::post('checklogin', [LoginFormController::class, 'checklogin']);
Route::get('logout', [LoginFormController::class, 'logout']);
//Route::get('login', [ 'as' => 'login', 'uses' => 'LoginFormController@index']);


Route::get('import-societyusers', [LoginFormController::class, 'importsocietyusers']);
Route::get('import-circleusers', [LoginFormController::class, 'importcircleusers']);
Route::get('import-regionusers', [LoginFormController::class, 'importregionusers']);

/**SocietyController */
Route::group(['middleware' => 'auth'], function () {

    Route::get('/society/dashboard', [SocietyController::class, 'dashboard']);

    Route::get('/society/loan/add', [SocietyController::class, 'loanadd']);
    Route::post('/society/loan/store', [SocietyController::class, 'loanstore']);
    Route::get('/society/loan', [SocietyController::class, 'loanlist']);
    Route::get('/society/loan/trans/{id}', [SocietyController::class, 'loantranslist']);

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

    Route::get('/society/services', [SocietyController::class, 'serviceslist']);
    Route::get('/society/services/add', [SocietyController::class, 'servicesadd']);
    Route::post('/society/services/store', [SocietyController::class, 'servicesstore']);

    Route::get('/society/croploan/target', [SocietyController::class, 'croploantargetlist']);
    Route::get('/society/croploan/target/add', [SocietyController::class, 'croploantargetadd']);
    Route::post('/society/croploan/target/store', [SocietyController::class, 'croploantargetstore']);

    Route::get('/society/croploan', [SocietyController::class, 'croploanentrylist']);
    Route::get('/society/croploan/entry', [SocietyController::class, 'croploanentryadd']);
    Route::post('/society/croploan/store', [SocietyController::class, 'croploanentrystore']);
    Route::get('/society/croploan/cropwise/{croploan_id}', [SocietyController::class, 'croploanentrycropwiselist']);

    Route::get('/society/croploan/loanissued', [SocietyController::class, 'croploanloanissuedlist']);
    Route::get('/society/croploan/loanissued/add', [SocietyController::class, 'croploanloanissuedadd']);
    Route::post('/society/croploan/loanissued/store', [SocietyController::class, 'croploanloanissuedstore']);

    Route::get('/superadmin/loanreport', [SuperAdminController::class, 'loanreport']);
    Route::get('/superadmin/depositreport', [SuperAdminController::class, 'depositreport']);
    Route::get('/superadmin/purchasereport', [SuperAdminController::class, 'purchasereport']);
    Route::get('/superadmin/salereport', [SuperAdminController::class, 'salereport']);
    Route::get('/superadmin/users', [SuperAdminController::class, 'userslist']);
    Route::get('/superadmin/user/add', [SuperAdminController::class, 'useradd']);
    Route::post('/superadmin/user/store', [SuperAdminController::class, 'userstore']);

    Route::post('/fetch/circle', [SuperAdminController::class, 'fetchcircle']);
    Route::post('/fetch/society', [SuperAdminController::class, 'fetchsociety']);
    Route::get('/superadmin/godownreport', [SuperAdminController::class, 'godownreport']);

    Route::get('/tableau/dashboard', [SuperAdminController::class, 'tableaudashboard']);


    //export table to excel
    Route::get('export/loanreport', [SuperAdminController::class, 'export_loanreport'])->name('export.loanreport');
    Route::get('export/depositreport', [SuperAdminController::class, 'export_depositreport'])->name('export.depositreport');
    Route::get('export/purchasereport', [SuperAdminController::class, 'export_purchasereport'])->name('export.purchasereport');
    Route::get('export/salereport', [SuperAdminController::class, 'export_salereport'])->name('export.salereport');


    Route::get('/dr/list', [DRController::class, 'list']);
    Route::get('/dr/add', [DRController::class, 'add']);
    Route::get('/dr/dashboard', [DRController::class, 'dashboard']);
    Route::get('/dr/loanlist', [DRController::class, 'loanlist']);
    Route::get('/dr/depositlist', [DRController::class, 'depositlist']);
    Route::get('/dr/purchaselist', [DRController::class, 'purchaselist']);
    Route::get('/dr/saleslist', [DRController::class, 'saleslist']);
    Route::get('/dr/godownlist', [DRController::class, 'godownlist']);
    Route::get('/dr/servicelist', [DRController::class, 'serviceslist']);
    Route::get('/dr/croploanlist', [DRController::class, 'croploanlist']);

    Route::get('/jr/list', [JRController::class, 'list']);
    Route::get('/jr/add', [JRController::class, 'add']);
    Route::get('/jr/dashboard', [JRController::class, 'dashboard']);
    Route::get('/jr/loanlist', [JRController::class, 'loanlist']);
    Route::get('/jr/depositlist', [JRController::class, 'depositlist']);
    Route::get('/jr/purchaselist', [JRController::class, 'purchaselist']);
    Route::get('/jr/saleslist', [JRController::class, 'saleslist']);
    Route::get('/jr/godownlist', [JRController::class, 'godownlist']);
    Route::get('/jr/servicelist', [JRController::class, 'serviceslist']);
    Route::get('/jr/croploanlist', [JRController::class, 'croploanlist']);

    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard']);
    Route::get('/superadmin/loanlist', [SuperAdminController::class, 'loanlist']);
    Route::get('/superadmin/depositlist', [SuperAdminController::class, 'depositlist']);
    Route::get('/superadmin/purchaselist', [SuperAdminController::class, 'purchaselist']);
    Route::get('/superadmin/saleslist', [SuperAdminController::class, 'saleslist']);
    Route::get('/superadmin/godownlist', [SuperAdminController::class, 'godownlist']);
    Route::get('/superadmin/servicelist', [SuperAdminController::class, 'serviceslist']);
    Route::get('/superadmin/croploanlist', [SuperAdminController::class, 'croploanlist']);

    Route::get('/md/dashboard', [MDController::class, 'dashboard']);
    Route::get('/md/loanlist', [MDController::class, 'loanlist']);
    Route::get('/md/depositlist', [MDController::class, 'depositlist']);
    Route::get('/md/purchaselist', [MDController::class, 'purchaselist']);
    Route::get('/md/saleslist', [MDController::class, 'saleslist']);
    Route::get('/md/godownlist', [MDController::class, 'godownlist']);
    Route::get('/md/servicelist', [MDController::class, 'serviceslist']);
    Route::get('/md/croploanlist', [MDController::class, 'croploanlist']);
});





Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/clear-config', function () {
    $exitCode = Artisan::call('config:clear');
    // return what you want
});
Route::get('/clear-optimize', function () {
    $exitCode = Artisan::call('optimize');
    // return what you want
});
Route::get('/clear-route', function () {
    $exitCode = Artisan::call('config:route');
    // return what you want
});
