<?php

use App\Http\Controllers\AddFriend;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('/register', [AuthController::class, 'postRegister']);
Route::post('/checkEmail',[AuthController::class,'checkEmail']);
Route::post('/updatepassword',[AuthController::class,'updatepassword']);
Route::post('/logout',[AuthController::class,'logout']);
Route::get('/profile/{id}',[AuthController::class,'profileReturn']);

Route::post('/handleImage/{id}',[AuthController::class,'handleImage']);
Route::put('updateUser/{id}',[AuthController::class,'updateUser']);

//add-Friend
Route::get('searchFriend/{id}',[AddFriend::class,'searchFriend']);
Route::post('AddFriend/{id}',[AddFriend::class,'AddFriend']);
Route::get('Sender/{id}',[AddFriend::class,'Sender']);
Route::get('SendInvitations/{id}',[AddFriend::class,'SendInvitations']);
Route::delete('revokeInvitat/{id}',[AddFriend::class,'revokeInvitat']);
Route::post('Accepted/{id}',[AddFriend::class,'Accepted']);
Route::post('Rejected/{id}',[AddFriend::class,'Rejected']);

