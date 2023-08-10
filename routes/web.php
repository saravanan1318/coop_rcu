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
    Route::get('/society/deposit/outstanding', [SocietyController::class, 'outstandinglist']);
    Route::get('/society/deposit/outstanding/add', [SocietyController::class, 'outstandingadd']);
    Route::post('/society/deposit/outstanding/store', [SocietyController::class, 'outstandingstore']);
    Route::get('/society/deposit/fdgovt', [SocietyController::class, 'fdgovtlist']);
    Route::get('/society/deposit/fdgovt/add', [SocietyController::class, 'fdgovtadd']);
    Route::post('/society/deposit/fdgovt/store', [SocietyController::class, 'fdgovtstore']);
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
