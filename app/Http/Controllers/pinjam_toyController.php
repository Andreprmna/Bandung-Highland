<?php

namespace App\Http\Controllers;

use App\Http\Requests\pinjam_toyRequest;
use App\Models\pinjam_toy;
use Illuminate\Http\Request;

class pinjam_toyController extends Controller
{
    public function regisPinjam_toy(pinjam_toyRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return pinjam_toy::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_toy'         => $data['id_toy'],
            'waktu_mulai'   => $data['waktu_mulai'],
            'waktu_selesai'       => $data['waktu_selesai'],
            'tgl_pengembalian'  => $data['tgl_pengembalian'],
            'denda'     => $data['denda']

        ]);
    }
}
