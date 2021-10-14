<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\atkController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\Booking_audioController;
use App\Http\Controllers\Booking_bukuController;
use App\Http\Controllers\Booking_Coworking_spaceController;
use App\Http\Controllers\Booking_toyController;
use App\Http\Controllers\Booking_video_Controller;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Coworking_space_propertiesController;
use App\Http\Controllers\Coworking_spaceController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\Pinjam_audioController;
use App\Http\Controllers\Pinjam_bukuController;
use App\Http\Controllers\pinjam_toyController;
use App\Http\Controllers\Pinjam_videoController;
use App\Http\Controllers\point_of_sellController;
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

Route::prefix('cms')
    ->group(function () {
        Route::get('/', [AdminUserController::class, 'indexAdmin']);
        Route::resource('users', AdminUserController::class);
        Route::get('admin-dashboard', [AdminUserController::class, 'dashboardAdmin']);
        Route::post('custom-admin-login', [AdminUserController::class, 'customAdminLogin'])->name('login.admin');
        Route::get('admin-signout', [AdminUserController::class, 'signOutAdmin'])->name('signout.admin');

        Route::resource('penerbits', PenerbitController::class);
        Route::resource('pengarangs', PengarangController::class);
        Route::resource('atks', atkController::class);
        Route::resource('audios', AudioController::class);
        Route::resource('booking_bukus', Booking_bukuController::class);
        Route::resource('booking_coworking_spaces', Booking_Coworking_spaceController::class);
        Route::resource('booking_toys', Booking_toyController::class);
        Route::resource('booking_videos', Booking_video_Controller::class);
        Route::resource('bukus', BukuController::class);
        Route::resource('coworking_space_properties', Coworking_space_propertiesController::class);
        Route::resource('coworking_spaces', Coworking_spaceController::class);
        Route::resource('pinjam_audios', Pinjam_audioController::class);
        Route::resource('pinjam_bukus', Pinjam_bukuController::class);
        Route::resource('pinjam_toys', pinjam_toyController::class);
        Route::resource('pinjam_videos', Pinjam_videoController::class);
        Route::resource('point_of_sells', point_of_sellController::class);
        Route::resource('properties', PropertiesController::class);
        Route::resource('toys', ToyController::class);
        Route::resource('Users', UserController::class);
        Route::resource('videos', VideoController::class);
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
Route::post('regis-Bbuku', [Booking_bukuController::class, 'regisBooking_buku'])->name('regis.bbuku');
Route::post('regis-Pbuku', [Pinjam_bukuController::class, 'regisPinjam_Buku'])->name('regis.pbuku');
Route::post('regis-Baudio', [Booking_audioController::class, 'regisBooking_video'])->name('regis.baudio');
Route::post('regis-BCws', [Booking_Coworking_spaceController::class, 'regisBooking_cws'])->name('regis.bcws');
Route::post('regis-Paudio', [Pinjam_audioController::class, 'regisPinjam_audio'])->name('regis.paudio');
Route::post('regis-POS', [point_of_sellController::class, 'regisPoint_off_sell'])->name('regis.pos');

Route::get('get-baudio', [Booking_audioController::class, 'getBooking'])->name('get.baudio');
Route::get('get-atk', [atkController::class, 'get_atk'])->name('get.atk');
Route::get('get-audio', [AudioController::class, 'getAudio'])->name('get.audio');
Route::get('get-Bbuku', [Booking_bukuController::class, 'getBooking_buku'])->name('get.bbuku');
Route::get('get-Bcws', [Booking_Coworking_spaceController::class, 'getBooking_cws'])->name('get.cws');
Route::get('get-Btoy', [Booking_toyController::class, 'getBooking_toy'])->name('get.btoy');
Route::get('get-Bvideo', [Booking_video_Controller::class, 'getBooking_video'])->name('get.bvideo');
Route::get('get-buku', [BukuController::class, 'getBuku'])->name('get.buku');
Route::get('get-CSP', [Coworking_space_propertiesController::class, 'getCSP'])->name('get.csp');
Route::get('get-CWS', [Coworking_spaceController::class, 'getCWS'])->name('name.cws');
Route::get('get-Penerbit', [PenerbitController::class, 'getPenerbit'])->name('get.penerbit');
Route::get('get-Pengarang', [PengarangController::class, 'getPengarang'])->name('get.pengarang');
Route::get('get-PAudio', [Pinjam_audioController::class, 'getPinjam_audio'])->name('get.paudio');
Route::get('get-PBuku', [Pinjam_bukuController::class, 'getPinjam_buku'])->name('get.pbuku');
Route::get('get-Ptoy', [pinjam_toyController::class, 'getPinjam_toy'])->name('get.ptoy');
Route::get('get-Pvideo', [Pinjam_videoController::class, 'getPinjam_video'])->name('get.pvideo');
Route::get('get-POS', [point_of_sellController::class, 'getPOS'])->name('get.pos');
Route::get('get-properties', [PropertiesController::class, 'getProperties'])->name('get.properties');
Route::get('get-toy', [ToyController::class, 'getToy'])->name('get.toy');
Route::get('get-user', [UserController::class, 'getuser'])->name('get.user');
Route::get('get-video', [VideoController::class, 'getVideo'])->name('get.video');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
