<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\DRController;
use App\Http\Controllers\JRController;
use App\Http\Controllers\MDController;
use App\Http\Controllers\PDSController;
use App\Http\Controllers\DRPDSController;

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


Route::get('/fetch-circles/{regionId}', [GeneralController::class, 'fetchCircles']);
Route::get('/fetch-societies/{circleId}', [GeneralController::class, 'fetchSocieties']);
//    Route::get('/fetch-societies-fromtype', [GeneralController::class, 'fetchSocietiesfromtype']);
Route::get('/fetch-societies-fromtype', [GeneralController::class, 'fetchSocietiesfromtype']);
Route::get('//fetch-societiestype-fromregions', [GeneralController::class, 'fetchSocietiestypefromregions']);
/*Json generate Part*/
Route::get('/report/loanreportjson', [JsonController::class, 'loanreportjson']);

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

    Route::get('/superadmin/croploanreport', [SuperAdminController::class, 'croploanreport']);
    Route::get('/superadmin/depositreport', [SuperAdminController::class, 'depositreport']);
    Route::get('/superadmin/purchasereport', [SuperAdminController::class, 'purchasereport']);
    Route::get('/superadmin/salereport', [SuperAdminController::class, 'salereport']);
    Route::get('/superadmin/byireport', [SuperAdminController::class, 'byireport']);
    Route::get('/superadmin/faceliftingreport', [SuperAdminController::class, 'faciliftingreport']);
    Route::get('/superadmin/isoreport', [SuperAdminController::class, 'isoreport']);
    Route::get('/superadmin/teareport', [SuperAdminController::class, 'teareport']);
    Route::get('/superadmin/indcoreport', [SuperAdminController::class, 'indcoreport']);
    Route::get('/superadmin/palmjaggeryreport', [SuperAdminController::class, 'palmjaggeryreport']);
    Route::get('/superadmin/upi_fpsreport', [SuperAdminController::class, 'upi_fpsreport']);
    Route::get('/superadmin/gunnyduereport', [SuperAdminController::class, 'gunnyduereport']);
    Route::get('/superadmin/gunnysalereport', [SuperAdminController::class, 'gunnysalereport']);
    Route::get('/superadmin/remittancereport', [SuperAdminController::class, 'remittancereport']);
    Route::get('/superadmin/saltreport', [SuperAdminController::class, 'saltreport']);
    Route::get('/superadmin/duesaltreport', [SuperAdminController::class, 'duesaltreport']);


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


    Route::get('/dr/eightyone/list', [DRController::class, 'eightyonelist']);
    Route::get('/dr/eightyone/add', [DRController::class, 'eightyoneadd']);
    Route::post('/dr/eightyone/store', [DRController::class, 'eightyonestore']);


    Route::get('/dr/eightytwo/list', [DRController::class, 'eightytwolist']);
    Route::get('/dr/eightytwo/add', [DRController::class, 'eightytwoadd']);
    Route::post('/dr/eightytwo/store', [DRController::class, 'eightytwostore']);

    Route::get('/dr/seventeena/list', [DRController::class, 'seventeenalist']);
    Route::get('/dr/seventeena/add', [DRController::class, 'seventeenaadd']);
    Route::post('/dr/seventeena/store', [DRController::class, 'seventeenastore']);


    Route::get('/dr/disqualify/list', [DRController::class, 'disqualifylist']);
    Route::get('/dr/disqualify/add', [DRController::class, 'disqualifyadd']);
    Route::post('/dr/disqualify/store', [DRController::class, 'disqualifystore']);

    Route::get('/dr/dai/list', [DRController::class, 'dailist']);
    Route::get('/dr/dai/add', [DRController::class, 'daiadd']);
    Route::post('/dr/dai/store', [DRController::class, 'daistore']);

    Route::get('/dr/surcharge/list', [DRController::class, 'surchargelist']);
    Route::get('/dr/surcharge/add', [DRController::class, 'surchargeadd']);
    Route::post('/dr/surcharge/store', [DRController::class, 'surchargestore']);

    Route::get('/jr/press/list', [JRController::class, 'presslist']);
    Route::get('/jr/press/add', [JRController::class, 'pressadd']);
    Route::post('/jr/press/store', [JRController::class, 'pressstore']);

    Route::get('/jr/profit/list', [JRController::class, 'profitlist']);
    Route::get('/jr/profit/add', [JRController::class, 'profitadd']);
    Route::post('/jr/profit/store', [JRController::class, 'profitstore']);

    Route::get('/jr/project/list', [JRController::class, 'projectlist']);
    Route::get('/jr/project/add', [JRController::class, 'projectadd']);
    Route::post('/jr/project/store', [JRController::class, 'projectstore']);


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
    // Route::get('/jr/loanlist', [JRController::class, 'loanlist']);
    Route::get('/jr/loanlist', [JRController::class, 'loanlist'])->name('loanlist.index');
//    Route::get('/fetch-circles/{regionId}', [JRController::class, 'fetchCircles']);
//    Route::get('/fetch-societies/{circleId}', [JRController::class, 'fetchSocieties']);


    // Route::get('/jr/loanlist', [JRController::class, 'loanlist'])->name('jr_loanlist');

    Route::get('/jr/depositlist', [JRController::class, 'depositlist']);
    Route::get('/jr/purchaselist', [JRController::class, 'purchaselist']);
    Route::get('/jr/saleslist', [JRController::class, 'saleslist']);
    Route::get('/jr/godownlist', [JRController::class, 'godownlist']);
    Route::get('/jr/servicelist', [JRController::class, 'serviceslist']);
    Route::get('/jr/croploanlist', [JRController::class, 'croploanlist']);


    Route::get('/jr/eightyone/list', [JRController::class, 'eightyonelist']);
    Route::get('/jr/eightyone/add', [JRController::class, 'eightyoneadd']);
    Route::post('/jr/eightyone/store', [JRController::class, 'eightyonestore']);


    Route::get('/jr/eightytwo/list', [JRController::class, 'eightytwolist']);
    Route::get('/jr/eightytwo/add', [JRController::class, 'eightytwoadd']);
    Route::post('/jr/eightytwo/store', [JRController::class, 'eightytwostore']);


    Route::get('/jr/seventeena/list', [JRController::class, 'seventeenalist']);
    Route::get('/jr/seventeena/add', [JRController::class, 'seventeenaadd']);
    Route::post('/jr/seventeena/store', [JRController::class, 'seventeenastore']);


    Route::get('/jr/seventeenb/list', [JRController::class, 'seventeenblist']);
    Route::get('/jr/seventeenb/add', [JRController::class, 'seventeenbadd']);
    Route::post('/jr/seventeenb/store', [JRController::class, 'seventeenbstore']);

    Route::get('/jr/disqualify/list', [JRController::class, 'disqualifylist']);
    Route::get('/jr/disqualify/add', [JRController::class, 'disqualifyadd']);
    Route::post('/jr/disqualify/store', [JRController::class, 'disqualifystore']);

    Route::get('/jr/dai/list', [JRController::class, 'dailist']);
    Route::get('/jr/dai/add', [JRController::class, 'daiadd']);
    Route::post('/jr/dai/store', [JRController::class, 'daistore']);

    Route::get('/jr/surcharge/list', [JRController::class, 'surchargelist']);
    Route::get('/jr/surcharge/add', [JRController::class, 'surchargeadd']);
    Route::post('/jr/surcharge/store', [JRController::class, 'surchargestore']);

    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard']);
    Route::get('/superadmin/loanlist', [SuperAdminController::class, 'loanlist']);
    Route::get('/superadmin/depositlist', [SuperAdminController::class, 'depositlist']);
    Route::get('/superadmin/purchaselist', [SuperAdminController::class, 'purchaselist']);
    Route::get('/superadmin/saleslist', [SuperAdminController::class, 'saleslist']);
    Route::get('/superadmin/godownlist', [SuperAdminController::class, 'godownlist']);
    Route::get('/superadmin/servicelist', [SuperAdminController::class, 'serviceslist']);
    Route::get('/superadmin/croploanlist', [SuperAdminController::class, 'croploanlist']);

    Route::get('/drpds/dashboard', [DRPDSController::class, 'dashboard']);
    Route::get('/drpds/build_yet_identified/list', [DRPDSController::class, 'identifiedlist']);
    Route::get('/drpds/build_yet_identified/add', [DRPDSController::class, 'identifiedadd']);
    Route::post('/drpds/build_yet_identified/store', [DRPDSController::class, 'identifiedstore']);

    Route::get('/drpds/build_yet_started/list', [DRPDSController::class, 'startedlist']);
    Route::get('/drpds/build_yet_started/add', [DRPDSController::class, 'startedadd']);
    Route::post('/drpds/build_yet_started/store', [DRPDSController::class, 'startedstore']);

    Route::get('/drpds/facelifting/list', [DRPDSController::class, 'faceliftinglist']);
    Route::get('/drpds/facelifting/add', [DRPDSController::class, 'faceliftingadd']);
    Route::post('/drpds/facelifting/store', [DRPDSController::class, 'faceliftingstore']);


    Route::get('/drpds/iso/list', [DRPDSController::class, 'isolist']);
    Route::get('/drpds/iso/add', [DRPDSController::class, 'isoadd']);
    Route::post('/drpds/iso/store', [DRPDSController::class, 'isostore']);

    Route::get('/drpds/tea/list', [DRPDSController::class, 'tealist']);
    Route::get('/drpds/tea/add', [DRPDSController::class, 'teaadd']);
    Route::post('/drpds/tea/store', [DRPDSController::class, 'teastore']);

    Route::get('/drpds/indcoserve/list', [DRPDSController::class, 'indcoservelist']);
    Route::get('/drpds/indcoserve/add', [DRPDSController::class, 'indcoserveadd']);
    Route::post('/drpds/indcoserve/store', [DRPDSController::class, 'indcoservestore']);


    Route::get('/drpds/salt/list', [DRPDSController::class, 'saltlist']);
    Route::get('/drpds/salt/add', [DRPDSController::class, 'saltadd']);
    Route::post('/drpds/salt/store', [DRPDSController::class, 'saltstore']);

    Route::get('/drpds/duesalt/list', [DRPDSController::class, 'duesaltlist']);
    Route::get('/drpds/duesalt/add', [DRPDSController::class, 'duesaltadd']);
    Route::post('/drpds/duesalt/store', [DRPDSController::class, 'duesaltstore']);

    Route::get('/drpds/special/list', [DRPDSController::class, 'speciallist']);
    Route::get('/drpds/special/add', [DRPDSController::class, 'specialadd']);
    Route::post('/drpds/special/store', [DRPDSController::class, 'specialstore']);


    Route::get('/md/dashboard', [MDController::class, 'dashboard']);
    Route::get('/md/loanlist', [MDController::class, 'loanlist']);
    Route::get('/md/depositlist', [MDController::class, 'depositlist']);
    Route::get('/md/purchaselist', [MDController::class, 'purchaselist']);
    Route::get('/md/saleslist', [MDController::class, 'saleslist']);
    Route::get('/md/godownlist', [MDController::class, 'godownlist']);
    Route::get('/md/servicelist', [MDController::class, 'serviceslist']);
    Route::get('/md/croploanlist', [MDController::class, 'croploanlist']);

    Route::get('/md/loanreport', [SuperAdminController::class, 'loanreport']);
    Route::get('/md/croploanreport', [SuperAdminController::class, 'croploanreport']);
    Route::get('/md/depositreport', [SuperAdminController::class, 'depositreport']);
    Route::get('/md/purchasereport', [SuperAdminController::class, 'purchasereport']);
    Route::get('/md/salereport', [SuperAdminController::class, 'salereport']);
    Route::get('/md/godownreport', [SuperAdminController::class, 'godownreport']);
    Route::get('/md/byireport', [SuperAdminController::class, 'byireport']);
    Route::get('/md/faceliftingreport', [SuperAdminController::class, 'faciliftingreport']);
    Route::get('/md/isoreport', [SuperAdminController::class, 'isoreport']);
    Route::get('/md/teareport', [SuperAdminController::class, 'teareport']);
    Route::get('/md/indcoreport', [SuperAdminController::class, 'indcoreport']);
    Route::get('/md/palmjaggeryreport', [SuperAdminController::class, 'palmjaggeryreport']);
    Route::get('/md/upi_fpsreport', [SuperAdminController::class, 'upi_fpsreport']);
    Route::get('/md/gunnyduereport', [SuperAdminController::class, 'gunnyduereport']);
    Route::get('/md/gunnysalereport', [SuperAdminController::class, 'gunnysalereport']);
    Route::get('/md/remittancereport', [SuperAdminController::class, 'remittancereport']);
    Route::get('/md/saltreport', [SuperAdminController::class, 'saltreport']);
    Route::get('/md/duesaltreport', [SuperAdminController::class, 'duesaltreport']);

    // Ranjith Routes
    // Master Controller
    Route::get('/superadmin/regionmaster', [MasterController::class, 'region']);
    Route::get('/superadmin/circlemaster', [MasterController::class, 'circle']);
    Route::get('/superadmin/societymaster', [MasterController::class, 'society']);
    Route::get('/superadmin/jrusers', [UserController::class, 'jrusers']);
    Route::get('/superadmin/drusers', [UserController::class, 'drusers']);
    Route::get('/superadmin/societyusers', [UserController::class, 'societyusers']);

    //PDS Controller
    //palmjaggery
    Route::get('/drpds/palm-jaggery/add', [PDSController::class, 'palmJaggeryAdd']);
    Route::post('/drpds/palm-jaggery/store', [PDSController::class, 'palmJaggeryStore']);
    Route::get('/drpds/palm-jaggery', [PDSController::class, 'palmJaggeryList']);
    //minoMillet
    Route::get('/drpds/mino-millet/add', [PDSController::class, 'minoMilletAdd']);
    Route::post('/drpds/mino-millet/store', [PDSController::class, 'minoMilletStore']);
    Route::get('/drpds/mino-millet', [PDSController::class, 'minoMilletList']);
    //upiFbs
    Route::get('/drpds/upi-fps/add', [PDSController::class, 'upiFbsAdd']);
    Route::post('/drpds/upi-fps/store', [PDSController::class, 'upiFbsStore']);
    Route::get('/drpds/upi-fps', [PDSController::class, 'upiFbsList']);
    //marginMoney
    Route::get('/drpds/margin-money/add', [PDSController::class, 'marginMoneyAdd']);
    Route::post('/drpds/margin-money/store', [PDSController::class, 'marginMoneyStore']);
    Route::get('/drpds/margin-money', [PDSController::class, 'marginMoneyList']);
    //gunnyDues
    Route::get('/drpds/gunny-dues/add', [PDSController::class, 'gunnyDuesAdd']);
    Route::post('/drpds/gunny-dues/store', [PDSController::class, 'gunnyDuesStore']);
    Route::get('/drpds/gunny-dues', [PDSController::class, 'gunnyDuesList']);
    //GunnySales
    Route::get('/drpds/gunny-sales/add', [PDSController::class, 'gunnySalesAdd']);
    Route::post('/drpds/gunny-sales/store', [PDSController::class, 'gunnySalesStore']);
    Route::get('/drpds/gunny-sales', [PDSController::class, 'gunnySalesList']);
    //RemittanceToGovtAc
    Route::get('/drpds/remittance-to-govt-ac/add', [PDSController::class, 'remittanceToGovtAcAdd']);
    Route::post('/drpds/remittance-to-govt-ac/store', [PDSController::class, 'remittanceToGovtAcStore']);
    Route::get('/drpds/remittance-to-govt-ac', [PDSController::class, 'remittanceToGovtAcList']);
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
