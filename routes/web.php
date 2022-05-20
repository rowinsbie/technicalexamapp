<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\CellController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [MaintenanceController::class, 'index'])->name('home');
Route::get('/new-maintenance', [MaintenanceController::class, 'MaintenanceForm']);
Route::get('/management', [ManagementController::class, 'index']);


Route::post('/create-floor',[ManagementController::class,'createFloor']);
Route::post('/update-cell',[CellController::class,'updateCell']);
Route::post('add-new-maintenance',[MaintenanceController::class,'createNewMaintenance']);
Route::post('/sign-in',[LoginController::class,'SignIn']);