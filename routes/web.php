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

    Route::get('/society/purchase/pdbunk', [SocietyController::class, 'pdbunklist']);
    Route::get('/society/purchase/pdbunk/add', [SocietyController::class, 'pdbunkadd']);
    Route::post('/society/purchase/pdbunk/store', [SocietyController::class, 'pdbunkstore']);

    Route::get('/society/purchase/ncc', [SocietyController::class, 'ncclist']);
    Route::get('/society/purchase/ncc/add', [SocietyController::class, 'nccadd']);
    Route::post('/society/purchase/ncc/store', [SocietyController::class, 'nccstore']);

Route::get('/society/deposit/outstanding', [SocietyController::class, 'outstandinglist']);
    Route::get('/society/deposit/outstanding/add', [SocietyController::class, 'outstandingadd']);
    Route::post('/society/deposit/outstanding/store', [SocietyController::class, 'outstandingstore']);

    Route::get('/society/deposit/fdgovt', [SocietyController::class, 'fdgovtlist']);
    Route::get('/society/deposit/fdgovt/add', [SocietyController::class, 'fdgovtadd']);
    Route::post('/society/deposit/fdgovt/store', [SocietyController::class, 'fdgovtstore']);

    Route::get('/society/deposit/fdind', [SocietyController::class, 'fdindlist']);
    Route::get('/society/deposit/fdind/add', [SocietyController::class, 'fdindadd']);
    Route::post('/society/deposit/fdind/store', [SocietyController::class, 'fdindstore']);

    Route::get('/society/deposit/fdist', [SocietyController::class, 'fdistlist']);
    Route::get('/society/deposit/fdist/add', [SocietyController::class, 'fdistadd']);
    Route::post('/society/deposit/fdist/store', [SocietyController::class, 'fdiststore']);

    Route::get('/society/deposit/rd/', [SocietyController::class, 'rdlist']);
    Route::get('/society/deposit/rd/add', [SocietyController::class, 'rdadd']);
    Route::post('/society/deposit/rd/store', [SocietyController::class, 'rdstore']);


    Route::get('/society/deposit/sb', [SocietyController::class, 'sblist']);
    Route::get('/society/deposit/sb/add', [SocietyController::class, 'sbadd']);
    Route::post('/society/deposit/sb/store', [SocietyController::class, 'sbstore']);

    Route::get('/society/deposit/current', [SocietyController::class, 'currentlist']);
    Route::get('/society/deposit/current/add', [SocietyController::class, 'currentadd']);
    Route::post('/society/deposit/current/store', [SocietyController::class, 'currentstore']);

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
