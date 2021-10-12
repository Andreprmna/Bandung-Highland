<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_Coworking_spaceRequest;
use App\Models\Booking_Coworking_space;
use Illuminate\Http\Request;

class Booking_Coworking_spaceController extends Controller
{
    public function regisBooking_cws(Booking_Coworking_spaceRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Booking_Coworking_space::create([
            'id_cs'     => $data['id_cs'],
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'tgl_mulai'   => $data['tgl_mulai'],
            'tgl_selesai' => $data['tgl_selesai']
        ]);
    }
    public function getBooking_cws()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Booking_Coworking_space::all();
        return $data;
    }
}
