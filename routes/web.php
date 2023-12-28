<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\IssuedCoversController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TokenUpdateController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationsController;

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

//https://www.cambotutorial.com/article/laravel-9-login-multiple-roles-using-custom-middleware

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'login'])->name('authlogin');

Route::get('/onfontoken', [TokenUpdateController::class, 'generatenewonfontoken'])->name('onfontoken');
Route::get('/sendsms', [TokenUpdateController::class, 'sendsms'])->name('sendonfontoken');
Route::get('/Tumasendsms', [TokenUpdateController::class, 'deliversms'])->name('sendsms');

Route::get('/BulkNotifications', [NotificationsController::class, 'SendSMSNotifications'])->name('sendbulksms');
Route::get('/ThanksNotifications', [NotificationsController::class, 'SendThanksSMSNotifications'])->name('sendthanksbulksms');

Auth::routes();

Route::middleware(['auth','user-role:admin'])->group(function()
{
    
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');


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
        Route::get('/tables', [DashboardController::class, 'table'])->name('table');

        //blank
        Route::get('/blank', [DashboardController::class, 'blank'])->name('blank');

        //form
        Route::get('/form', [DashboardController::class, 'form'])->name('form');


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


        //covers pages
        Route::get('/IssuedCovers', [IssuedCoversController::class, 'issuedCovers'])->name('issuedcoverspages');//IssuedCoversController
        Route::post('/SaveIssuedCovers', [IssuedCoversController::class, 'saveissuedCover'])->name('saveissuedcover');

        //claims pages
        Route::get('/ClaimList', [ClaimController::class, 'RegisteredClaims'])->name('ClaimListpage');//registered claims
        Route::post('/SaveNewClaim', [ClaimController::class, 'saveclaim'])->name('saveclaim');
        Route::get('/RegisterClaimList', [ClaimController::class, 'RegisterClaim'])->name('ClaimRegpage');//registered claims


        });
});


Route::get('/homeLink', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route User
Route::middleware(['auth','user-role:user'])->group(function()
{
   // Route::get("/home",[HomeController::class, 'userHome'])->name("home");
   Route::get('/', function () { return view('welcome'); });
});
// Route Editor
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
});


