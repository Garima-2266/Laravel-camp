<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;


use Illuminate\Http\Request;

 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/user',[UserController::class,'index']);

Route::post('/upload', [UserController::class, 'uploadAvatar']);

    // $request->image->store('images','public');
    // return 'Uploadeddd!';
    // dd($request->hasFile('image'));
    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
