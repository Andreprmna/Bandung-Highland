<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_toyRequest;
use App\Models\Booking_toy;
use Illuminate\Http\Request;

class Booking_toyController extends Controller
{
    public function regisBooking_toy(Booking_toyRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Booking_toy::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_toy'         => $data['id_toy'],
            'waktu_mulai'   => $data['waktu_mulai']
        ]);
    }
}
