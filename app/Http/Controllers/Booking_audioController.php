<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_audioRequest;
use App\Models\Booking_audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Booking_audioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $booking_audio = Booking_audio::paginate();

            return view('admin.booking_audio.booking_audios', [
                'booking_audio' => $booking_audio
            ]);
        }

        return redirect('cms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booking_audio.create-booking_audio');
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

        $check = $this->createPenerbit($data);

        return redirect()->route("booking_audios.index");
    }

    public function createPenerbit(array $data)
    {
        return Booking_audio::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_audio'     => $data['id_audio'],
            'tgl_mulai'   => $data['tgl_mulai'],
            'tgl_selesai' => $data['tgl_selesai']

        ]);
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
        return view('admin.booking_audio.edit-booking_audio', [
            'item' => $booking_audio
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
        $data = $request->all();

        $booking_audio->update($data);

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
