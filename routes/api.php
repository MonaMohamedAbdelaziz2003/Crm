<?php

use App\Http\Controllers\carController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\noteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/home',function(){
        return view('home');
});

Route::get('/test/{id?}',[testController::class,'index']);
// Route::middleware('auth:sanctum')->group(function(){
    // ////// customer
    Route::get('/customer/{id}',[customerController::class,'view']);
    Route::post('/customer',[CustomerController::class,'create']);
    Route::post('/customer/export',[CustomerController::class,'export']);
    Route::patch('/customer/{id}',[CustomerController::class,'update1']);
    Route::delete('/customer/{id}',[CustomerController::class,'delete']);
    Route::get('/customer',[CustomerController::class,'index']);
    // ////// Note
    Route::get('/customer/{customerid}/note/{id}',[noteController::class,'view']);
    Route::post('/customer/{customerid}/note',[noteController::class,'create']);
    Route::patch('/customer/{customerid}/note/{id}',[noteController::class,'update']);
    Route::delete('/customer/{customerid}/note/{id}',[noteController::class,'delete']);
    Route::get('/customer/{customerid}/notes',[noteController::class,'index']);
    //////// invoices
    Route::get('/customer/{customerid}/invoice/{id}',[invoiceController::class,'view']);
    Route::post('/customer/{customerid}/invoice',[invoiceController::class,'create']);
    Route::patch('/customer/{customerid}/invoice/{id}',[invoiceController::class,'update']);
    Route::delete('/customer/{customerid}/invoice/{id}',[invoiceController::class,'delete']);
    Route::get('/customer/{customerid}/invoices',[invoiceController::class,'index']);
    //////// Project
    Route::get('/customer/{customerid}/project/{id}',[ProjectController::class,'view']);
    Route::patch('/customer/{customerid}/project/{id}',[ProjectController::class,'update']);
    Route::delete('/customer/{customerid}/project/{id}',[ProjectController::class,'delete']);
    Route::get('/customer/{customerid}/projects',[ProjectController::class,'index']);
    Route::post('/customer/{customerid}/project',[ProjectController::class,'create']);
// });
Route::post('/user',[userController::class,'create']);
Route::get('/car',[carController::class,'index']);
Route::get('/user',[userController::class,'index']);


//register
Route::post('register', [RegisterController::class,'register']);
Route::post('login', [LoginController::class,'login']);
