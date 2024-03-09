<?php

use App\Http\Controllers\Auth\LoginController;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OtpNotification;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/test-otp", function () {
////    $otp = (new Otp)->generate('admin@gmail.com', 'numeric', 4, 15);
//    $otp = (new Otp)->validate('admin@gmail.com', "8359");
//    dd($otp);

//    dd(generateOtp("admin@gmail.com"));
//    dd(validateOtp("admin@gmail.com", "375013"));

    $otp = generateOtp("admin@gmail.com");

    Notification::route("mail", "dothenhuan26@gmail.com")->notify(new OtpNotification($otp));

});

Route::get("/2fa", [LoginController::class, "get2faForm"])->name("2fa");
Route::post("/2fa", [LoginController::class, "handle2fa"]);

