<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientsController;

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



Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

//table
Route::get('/tables', [HomeController::class, 'table'])->name('table');

//blank
Route::get('/blank', [HomeController::class, 'blank'])->name('blank');

//form
Route::get('/form', [HomeController::class, 'form'])->name('form');


//Register Clients
Route::get('/RegisterClients', [ClientsController::class, 'ClientsRegistration'])->name('RegClients');

//Register Clients
Route::get('/ListClients', [ClientsController::class, 'ClientsList'])->name('ListClients');

//search Registered Clients
Route::get('/SearchClients', [ClientsController::class, 'SearchClient'])->name('SearchClient');