<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_video_Request;
use App\Models\Booking_video;
use Illuminate\Http\Request;

class Booking_video_Controller extends Controller
{
    public function regisBooking_video(Booking_video_Request $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Booking_video::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_video'     => $data['id_video'],
            'waktu_mulai'   => $data['waktu_mulai'],
            'waktu_selesai' => $data['waktu_selesai']
        ]);
    }
    public function getBooking_video()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Booking_video::all();
        return $data;
    }
}
