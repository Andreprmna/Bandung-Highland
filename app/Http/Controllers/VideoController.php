<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function regisVideo(VideoRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }
    public function create(array $data)
    {
        return Video::create([
            'judul'         => $data['judul'],
            'tahun_rilis'   => $data['tahun_rilis'],
            'genre'         => $data['genre'],
            'durasi'        => $data['durasi'],
            'format'        => $data['format'],
            'deskripsi'     => $data['deskripsi'],
            'cover'         => $data['cover'],
            'trailer'       => $data['trailer'],

        ]);
    }
}
