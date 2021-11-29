<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking_audioRequest;
use App\Models\Audio;
use App\Models\Booking_audio;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Pinjam_audio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function store(Booking_audioRequest $request)
    {
        $data = $request->all();
        $data['id_member'] = Auth::guard('web')->id();
        $data['id_admin'] = 0;
        $data['status'] = 2;

        $booking = Booking_audio::where('status', 1)->where('id_audio', $data['id_audio'])->whereDate('tgl_mulai', '<=', $data['tgl_mulai'])->whereDate('tgl_selesai', '>=', $data['tgl_mulai'])->first();
        $pinjam = Pinjam_audio::where('status', 1)->where('id_audio', $data['id_audio'])->whereDate('tgl_pinjam', '<=', $data['tgl_mulai'])->whereDate('tgl_kembali', '>=', $data['tgl_mulai'])->first();

        if ($pinjam == null) {
            if ($booking == null) {
                if (Auth::guard('web')->check()) {
                    Booking_audio::create($data);

                    Alert::success('Booked', 'Booking Successful!');
                    return redirect()->route("audio.index");
                }
                
                return redirect()->route("login");
            } else {
                throw ValidationException::withMessages(['Audio dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Audio dengan tanggal terpilih telah dipinjam']);
        }

        return redirect()->route("audio.index");
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
