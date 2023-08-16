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
    
    Route::get('/society/purchase/fertilizer', [SocietyController::class, 'fertilizerlist']);
    Route::get('/society/purchase/fertilizer/add', [SocietyController::class, 'fertilizeradd']);
    Route::post('/society/purchase/fertilizer/store', [SocietyController::class, 'fertilizerstore']);

    Route::get('/society/purchase/pharmacy', [SocietyController::class, 'pharmacylist']);
    Route::get('/society/purchase/pharmacy/add', [SocietyController::class, 'pharmacyadd']);
    Route::post('/society/purchase/pharmacy/store', [SocietyController::class, 'pharmacystore']);

    Route::get('/society/purchase/ffo', [SocietyController::class, 'ffolist']);
    Route::get('/society/purchase/ffo/add', [SocietyController::class, 'ffoadd']);
    Route::post('/society/purchase/ffo/store', [SocietyController::class, 'ffostore']);

    Route::get('/society/purchase/pdbunk', [SocietyController::class, 'pdbunklist']);
    Route::get('/society/purchase/pdbunk/add', [SocietyController::class, 'pdbunkadd']);
    Route::post('/society/purchase/pdbunk/store', [SocietyController::class, 'pdbunkstore']);

    Route::get('/society/purchase/ncc', [SocietyController::class, 'ncclist']);
    Route::get('/society/purchase/ncc/add', [SocietyController::class, 'nccadd']);
    Route::post('/society/purchase/ncc/store', [SocietyController::class, 'nccstore']);

    //sales

    Route::get('/society/sales/fertilizer', [SocietyController::class, 'fertilizerlist']);
    Route::get('/society/sales/fertilizer/add', [SocietyController::class, 'fertilizeradd']);
    Route::post('/society/sales/fertilizer/store', [SocietyController::class, 'fertilizerstore']);

    Route::get('/society/sales/pharmacy', [SocietyController::class, 'pharmacylist']);
    Route::get('/society/sales/pharmacy/add', [SocietyController::class, 'pharmacyadd']);
    Route::post('/society/sales/pharmacy/store', [SocietyController::class, 'pharmacystore']);

    Route::get('/society/sales/ffo', [SocietyController::class, 'ffolist']);
    Route::get('/society/sales/ffo/add', [SocietyController::class, 'ffoadd']);
    Route::post('/society/sales/ffo/store', [SocietyController::class, 'ffostore']);

    Route::get('/society/sales/pdbunk', [SocietyController::class, 'pdbunklist']);
    Route::get('/society/sales/pdbunk/add', [SocietyController::class, 'pdbunkadd']);
    Route::post('/society/sales/pdbunk/store', [SocietyController::class, 'pdbunkstore']);

    Route::get('/society/sales/ncc', [SocietyController::class, 'ncclist']);
    Route::get('/society/sales/ncc/add', [SocietyController::class, 'nccadd']);
    Route::post('/society/sales/ncc/store', [SocietyController::class, 'nccstore']);

    Route::get('/society/godown', [SocietyController::class, 'godownlist']);
    Route::get('/society/godown/add', [SocietyController::class, 'godownadd']);
    Route::post('/society/godown/store', [SocietyController::class, 'godownstore']);

    Route::get('/society/services/csc', [SocietyController::class, 'csclist']);
    Route::get('/society/services/csc/add', [SocietyController::class, 'cscadd']);
    Route::post('/society/services/csc/store', [SocietyController::class, 'cscstore']);

    Route::get('/society/services/agri', [SocietyController::class, 'agrilist']);
    Route::get('/society/services/agri/add', [SocietyController::class, 'agriadd']);
    Route::post('/society/services/agri/store', [SocietyController::class, 'agristore']);

    Route::get('/society/services/dry', [SocietyController::class, 'drylist']);
    Route::get('/society/services/dry/add', [SocietyController::class, 'dryadd']);
    Route::post('/society/services/dry/store', [SocietyController::class, 'drystore']);

    Route::get('/society/services/ps', [SocietyController::class, 'pslist']);
    Route::get('/society/services/ps/add', [SocietyController::class, 'psadd']);
    Route::post('/society/services/ps/store', [SocietyController::class, 'psstore']);

    Route::get('/society/services/pss', [SocietyController::class, 'psslist']);
    Route::get('/society/services/pss/add', [SocietyController::class, 'pssadd']);
    Route::post('/society/services/pss/store', [SocietyController::class, 'pssstore']);

    Route::get('/society/services/lodging', [SocietyController::class, 'lodginglist']);
    Route::get('/society/services/lodging/add', [SocietyController::class, 'lodgingadd']);
    Route::post('/society/services/lodging/store', [SocietyController::class, 'lodgingstore']);

    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard']);
    Route::get('/superadmin/loanreport', [SuperAdminController::class, 'loanreport']);
    Route::get('/superadmin/depositreport', [SuperAdminController::class, 'depositreport']);

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
