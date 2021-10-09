<?php

use App\Http\Controllers\atkController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\Booking_toyController;
use App\Http\Controllers\Booking_video_Controller;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Coworking_space_propertiesController;
use App\Http\Controllers\Coworking_spaceController;
use App\Http\Controllers\pinjam_toyController;
use App\Http\Controllers\Pinjam_videoController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ToyController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');
Route::post('regis-pengarang', [PengarangController::class, 'regisPengarang'])->name('regis.pengarang');
Route::post('regis-penerbit', [PenerbitController::class, 'regisPenerbit'])->name('regis.penerbit');
Route::post('regis-buku', [BukuController::class, 'regisBuku'])->name('regis.buku');
Route::post('regis-video', [VideoController::class, 'regisVideo'])->name('regis.video');
Route::post('regis-toy', [ToyController::class, 'regisToy'])->name('regis.toy');
Route::post('regis-audio', [AudioController::class, 'regisAudio'])->name('regis.audio');
Route::post('regis-atk', [atkController::class, 'regisAtk'])->name('regis.atk');
Route::post('regis-Coworking_Space', [Coworking_spaceController::class, 'regisCoworking_space'])->name('regis.coworking_space');
Route::post('regis-csp', [Coworking_space_propertiesController::class, 'regis_CSP'])->name('regis.csp');
Route::post('regis-properties', [PropertiesController::class, 'regisProperties'])->name('regis.properties');
Route::post('regis-Ptoy', [pinjam_toyController::class, 'regisPinjam_toy'])->name('regis.ptoy');
Route::post('regis-Btoy', [Booking_toyController::class, 'regisBooking_toy'])->name('regis.btoy');
Route::post('regis-Bvideo', [Booking_video_Controller::class, 'regisBooking_video'])->name('regis.bvideo');
Route::post('regis-Pvideo', [Pinjam_videoController::class, 'regisPinjam_video'])->name('regis.pvideo');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
