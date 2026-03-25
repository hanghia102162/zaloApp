<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('/register', [AuthController::class, 'postRegister']);
Route::post('/checkEmail',[AuthController::class,'checkEmail']);
Route::post('/updatepassword',[AuthController::class,'updatepassword']);
Route::get('/profile/{id}',[AuthController::class,'profileReturn']);

Route::post('/handleImage/{id}',[AuthController::class,'handleImage']);
Route::post('updateUser/{id}',[AuthController::class,'updateUser']);