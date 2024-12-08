<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class,'auth_login']);
Route::get('/logout',[AuthController::class,'logout']);


Route::group(['middleware'=>'useradmin'],function()
{
    Route::get('panel/dashboard',[DashboardController::class,'dashboard']);
    Route::get('panel/role',[RoleController::class,'list']);
    Route::post('panel/role/add',[RoleController::class,'insert']);
    Route::post('panel/role/edit/{id}',[RoleController::class,'update']);
    Route::get('panel/role/delete/{id}',[RoleController::class,'delete']);
    
    Route::get('panel/user',[UserController::class,'userList']);
    Route::post('panel/user/add',[UserController::class,'insertUser']);
    Route::post('panel/user/edit/{id}',[UserController::class,'updateUser']);
    Route::get('panel/user/delete/{id}',[UserController::class,'deleteUser']);

});