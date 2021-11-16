<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Booking_audio;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Pinjam_audio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingAudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audio = Audio::paginate();

        return view('booking.audio.list-booking-audio', [
            'audio' => $audio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function CreateBooking_audio(array $data)
    {
        $booking = Booking_audio::where('id_audio', $data['id_audio'])->wherebetween('tgl_mulai', [$data['tgl_mulai'], $data['tgl_selesai']])->first();
        $pinjam = Pinjam_audio::where('id_audio', $data['id_audio'])->wherebetween('tgl_pinjam', [$data['tgl_mulai'], $data['tgl_selesai']])->first();
        if ($pinjam == null) {
            if ($booking == null) {

                return Booking_audio::create([
                    'id_member'  => $data['id_member'],
                    'id_admin'   => 0,
                    'id_audio'     => $data['id_audio'],
                    'tgl_mulai'   => $data['tgl_mulai'],
                    'tgl_selesai' => $data['tgl_selesai']

                ]);
            } else {
                throw new Exception('Audio sudah dibooking./ tidak ditemukan');
            }
        } else {
            throw new Exception('Audio sudah dipinjam./ tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        return view('booking.audio.form-booking-audio', [
            'item' => $audio,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
