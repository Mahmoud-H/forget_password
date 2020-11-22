<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsertController;

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
    return view('welcome');
});
//Route::get('/', [InsertController::class, 'index']);
//Route::post('/submitForm', [InsertController::class, 'submitForm']);
//Route::post('/submitotp', [InsertController::class, 'submitOtp']);
//Route::get('/showresult', [InsertController::class, 'show']);

//Route::get('/','InsertController@index');
//Route::post('/submitForm','App\Http\Controllers\InsertController@submitForm');
//Route::post('/submitotp','App\Http\Controllers\InsertController@submitOtp');
//Route::get('/showresult','App\Http\Controllers\InsertController@show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

 Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('mahmoudal-ashqur30121994@hotmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});