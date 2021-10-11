<?php

namespace App\Http\Controllers;

use App\Http\Requests\pinjam_toyRequest;
use App\Http\Requests\Pinjam_videoRequest;
use App\Models\Pinjam_video;
use Illuminate\Http\Request;

class Pinjam_videoController extends Controller
{
    public function regisPinjam_video(Pinjam_videoRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Pinjam_video::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_video'         => $data['id_video'],
            'waktu_mulai'   => $data['waktu_mulai'],
            'waktu_selesai'       => $data['waktu_selesai'],
            'tgl_pengembalian'  => $data['tgl_pengembalian'],
            'denda'     => $data['denda']

        ]);
    }
}
