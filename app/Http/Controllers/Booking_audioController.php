<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_audioRequest;
use App\Models\Admin;
use App\Models\Audio;
use App\Models\Booking_audio;
use App\Models\Member;
use App\Models\Pinjam_audio;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Booking_audioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_audio = Booking_audio::with('member', 'admin', 'audio')->paginate();

        return view('admin.audio.list-booking-audio', [
            'booking_audio' => $booking_audio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::paginate();
        $user = Admin::paginate();
        $audio = Audio::where('status', 1)->paginate();

        return view('admin.audio.booking-audio', [
            'member' => $member,
            'user' => $user,
            'audio' => $audio
        ]);
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

        $check = $this->CreateBooking_audio($data);

        return redirect()->route("booking_audios.index");
    }


    public function CreateBooking_audio(array $data)
    {
        $booking = Booking_audio::where('id_audio', $data['id_audio'])->whereDate('tgl_mulai', '<=', $data['tgl_mulai'])->whereDate('tgl_selesai', '>=', $data['tgl_mulai'])->first();
        $pinjam = Pinjam_audio::where('id_audio', $data['id_audio'])->whereDate('tgl_pinjam', '<=', $data['tgl_mulai'])->whereDate('tgl_kembali', '>=', $data['tgl_mulai'])->first();
        if ($pinjam == null) {
            if ($booking == null) {

                return Booking_audio::create([
                    'id_member'  => $data['id_member'],
                    'id_admin'   => $data['id_admin'],
                    'id_audio'     => $data['id_audio'],
                    'tgl_mulai'   => $data['tgl_mulai'],
                    'tgl_selesai' => $data['tgl_selesai']

                ]);
            } else {
                throw ValidationException::withMessages(['Audio dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Audio dengan tanggal terpilih telah dipinjam']);
        }
    }
    public function BookingSelesai(array $data)
    {
        $audio = Audio::where('id_audio', $data['id_audio'])->firstOrFail();
        $audio->status = 0;
        $audio->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking_audio $booking_audio)
    {
        $member = Member::paginate();
        $user = Admin::paginate();
        $audio = Audio::paginate();

        return view('admin.audio.update-booking-audio', [
            'item' => $booking_audio,
            'member' => $member,
            'user' => $user,
            'audio' => $audio
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking_audio $booking_audio)
    {
        if ($booking_audio->status == 1) {
            $booking_audio->status = $request->status;
            $booking_audio->save();
        } elseif ($booking_audio->status == 0) {
            $booking_audio->status = 1;
            $booking_audio->id_admin = Auth::guard('admin')->id();
            $booking_audio->save();
        }

        return redirect()->route('booking_audios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_audio $booking_audio)
    {
        $booking_audio->delete();
        
        return redirect()->route('booking_audios.index');
    }
}
