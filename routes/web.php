<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/file-uploads',[FileUploadController::class,'index'])->name('file-uploads.index');
Route::post('/file-uploads',[FileUploadController::class,'store'])->name('file-uploads.store');
Route::delete('/file-uploads/{file_name}',[FileUploadController::class,'destroy'])->name('file-uploads.destroy');
Route::get('/create-directory',[FileUploadController::class,'createDirectory'])->name('file-uploads.create-directory');
Route::get('/delete-directory',[FileUploadController::class,'destroyDirectory'])->name('file-uploads.destroy-directory');
