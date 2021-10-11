<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pinjam_audioRequest;
use App\Models\Audio;
use App\Models\Pinjam_audio;
use Illuminate\Http\Request;

class Pinjam_audioController extends Controller
{
    public function regisPinjam_audio(Pinjam_audioRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Pinjam_audio::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_audio'         => $data['id_audio'],
            'tgl_pinjam'   => $data['tgl_pinjam'],
            'tgl_kembali'       => $data['tgl_kembali'],
            'tgl_pengembalian'  => $data['tgl_pengembalian'],
            'denda'     => $data['denda']

        ]);
    }
    public function getPinjam_audio()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Pinjam_audio::all();
        return $data;
    }
}
