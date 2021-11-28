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
use App\Http\Controllers\Client\BookingAudioController;
use App\Http\Controllers\Client\BookingBukuController;
use App\Http\Controllers\Client\BookingCoSpaceController;
use App\Http\Controllers\Client\BookingToyController;
use App\Http\Controllers\Client\BookingVideoController;
use App\Http\Controllers\Coworking_space_propertiesController;
use App\Http\Controllers\Coworking_spaceController;
use App\Http\Controllers\MemberClientController;
use App\Http\Controllers\MemberController;
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
        Route::get('/', [AdminUserController::class, 'indexAdmin'])->name('cms');
        Route::resource('admins', AdminUserController::class)->middleware('auth:admin');
        Route::get('admin-dashboard', [AdminUserController::class, 'dashboardAdmin'])->middleware('auth:admin');
        Route::post('custom-admin-login', [AdminUserController::class, 'customAdminLogin'])->name('login.admin');
        Route::get('admin-signout', [AdminUserController::class, 'signOutAdmin'])->name('signout.admin');
        Route::get('admin-profile', [AdminUserController::class, 'editProfile'])->name('admin.profile')->middleware('auth:admin');
        Route::post('admin-password',  [adminUserController::class,'changePassword'])->name('admin.password');

        Route::get('booking-audio-export', [Booking_audioController::class, 'export_excel'])->name('export.booking.audio');
        Route::get('booking-buku-export', [Booking_bukuController::class, 'export_excel'])->name('export.booking.buku');
        Route::get('booking-cospace-export', [Booking_Coworking_spaceController::class, 'export_excel'])->name('export.booking.cospace');
        Route::get('booking-toy-export', [Booking_toyController::class, 'export_excel'])->name('export.booking.toy');
        Route::get('booking-video-export', [Booking_video_Controller::class, 'export_excel'])->name('export.booking.video');

        Route::get('pinjam-audio-export', [Pinjam_audioController::class, 'export_excel'])->name('export.pinjam.audio');
        Route::get('pinjam-buku-export', [Pinjam_bukuController::class, 'export_excel'])->name('export.pinjam.buku');
        Route::get('pinjam-toy-export', [Pinjam_toyController::class, 'export_excel'])->name('export.pinjam.toy');
        Route::get('pinjam-video-export', [Pinjam_videoController::class, 'export_excel'])->name('export.pinjam.video');

        Route::resource('penerbits', PenerbitController::class)->middleware('auth:admin');
        Route::resource('pengarangs', PengarangController::class)->middleware('auth:admin');
        Route::resource('atks', atkController::class)->middleware('auth:admin');
        Route::resource('audios', AudioController::class)->middleware('auth:admin');
        Route::resource('booking_audios', Booking_audioController::class)->middleware('auth:admin');
        Route::resource('booking_bukus', Booking_bukuController::class)->middleware('auth:admin');
        Route::resource('booking_coworking_spaces', Booking_Coworking_spaceController::class)->middleware('auth:admin');
        Route::resource('booking_toys', Booking_toyController::class)->middleware('auth:admin');
        Route::resource('booking_videos', Booking_video_Controller::class)->middleware('auth:admin');
        Route::resource('bukus', BukuController::class)->middleware('auth:admin');
        Route::resource('coworking_space_properties', Coworking_space_propertiesController::class)->middleware('auth:admin');
        Route::resource('coworking_spaces', Coworking_spaceController::class)->middleware('auth:admin');
        Route::resource('pinjam_audios', Pinjam_audioController::class)->middleware('auth:admin');
        Route::resource('pinjam_bukus', Pinjam_bukuController::class)->middleware('auth:admin');
        Route::resource('pinjam_toys', pinjam_toyController::class)->middleware('auth:admin');
        Route::resource('pinjam_videos', Pinjam_videoController::class)->middleware('auth:admin');
        Route::resource('point_of_sells', point_of_sellController::class)->middleware('auth:admin');
        Route::resource('properties', PropertiesController::class)->middleware('auth:admin');
        Route::resource('toys', ToyController::class)->middleware('auth:admin');
        Route::resource('members', MemberController::class)->middleware('auth:admin');
        Route::resource('videos', VideoController::class)->middleware('auth:admin');
    });


Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-member-login', [MemberClientController::class, 'customMemberLogin'])->name('login.member');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');
Route::get('update-profile', [MemberClientController::class, 'profile'])->name('update.profile');
Route::post('change-password',  [MemberClientController::class,'changePassword'])->name('change.password');

Route::prefix('profile')
    ->group(function () {
        Route::resource('member', MemberClientController::class);
    });

Route::prefix('layanan')
    ->group(function () {
        Route::resource('booking/buku', BookingBukuController::class);
        Route::resource('booking/audio', BookingAudioController::class);
        Route::resource('booking/video', BookingVideoController::class);
        Route::resource('booking/coworking-space', BookingCoSpaceController::class);
        Route::resource('booking/toy', BookingToyController::class);
    });

Route::prefix('about')
    ->group(function () {
        Route::get('/visi-misi', function () {
            return view('visi-misi');
        })->name('visi-misi');
        Route::get('/contact-us', function () {
            return view('contact-us');
        })->name('contact-us');
    });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
