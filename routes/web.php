<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('empleado.index');
});

//this is for called the mehtod
Route::get('/empleado/create',[EmpleadoController::class,'create']);

//this is for access to all URL
//look in php artisan route:list
Route::resource('/empleado',EmpleadoController::class);