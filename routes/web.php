<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\IssuedCoversController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TokenUpdateController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/onfontoken', [TokenUpdateController::class, 'generatenewonfontoken'])->name('onfontoken');

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');


Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $cleardebugbar = Artisan::call('debugbar:clear');
    echo "Debug Bar cleared<br>";
});

//table
Route::get('/tables', [HomeController::class, 'table'])->name('table');

//blank
Route::get('/blank', [HomeController::class, 'blank'])->name('blank');

//form
Route::get('/form', [HomeController::class, 'form'])->name('form');


Route::get('IssuedCoversPDF', [ReportController::class, 'issuedCovers'])->name('IssuedCoversPDF');// issued covers pdf report

Route::get('clientRegisterReport', [ReportController::class, 'clientRegister'])->name('clientsRegisterPDF');
Route::get('ClientIssuedCovers', [ReportController::class, 'issuedCovers'])->name('issuedCoversPDF');


//Register Clients
Route::get('/RegisterClients', [ClientsController::class, 'ClientsRegistration'])->name('RegClients');
Route::post('/SaveRegisterClient', [ClientsController::class, 'storeClient'])->name('saveClient');//save client

//Register Clients
Route::get('/ListClients', [ClientsController::class, 'ClientsList'])->name('ListClients');

//search Registered Clients
Route::get('/SearchClients', [ClientsController::class, 'SearchClient'])->name('SearchClient');



//policies pages
Route::get('/PoliciesTab', [PoliciesController::class, 'policiestab'])->name('policiespages');//IssuedCoversController
Route::post('/SavePolicy', [PoliciesController::class, 'savepolicy'])->name('savepolicy');//savepolicy


//policies pages
Route::get('/IssuedCovers', [IssuedCoversController::class, 'issuedCovers'])->name('issuedcoverspages');//IssuedCoversController
Route::post('/SaveIssuedCovers', [IssuedCoversController::class, 'saveissuedCover'])->name('saveissuedcover');