<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_bukuRequest;
use App\Models\Booking_buku;
use Illuminate\Http\Request;

class Booking_bukuController extends Controller
{
    public function regisBooking_buku(Booking_bukuRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Booking_buku::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_buku'     => $data['id_buku'],
            'tgl_mulai'   => $data['tgl_mulai'],
            'tgl_selesai' => $data['tgl_selesai']
        ]);
    }
    public function getBooking_buku()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Booking_buku::all();
        return $data;
    }
}
