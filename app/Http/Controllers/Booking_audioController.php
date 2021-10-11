<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_audioRequest;
use App\Models\Booking_audio;
use Illuminate\Http\Request;

class Booking_audioController extends Controller
{
    public function regisBooking_video(Booking_audioRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Booking_audio::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_audio'     => $data['id_audio'],
            'tgl_mulai'   => $data['tgl_mulai'],
            'tgl_selesai' => $data['tgl_selesai']
        ]);
    }
}
