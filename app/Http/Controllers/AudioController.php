<?php

namespace App\Http\Controllers;

use App\Http\Requests\AudioRequest;
use App\Models\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function regisAudio(AudioRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Audio::create([
            'judul'  => $data['judul'],
            'pengisi_suara' => $data['pengisi_suara'],
            'tahun_rilis'   => $data['tahun_rilis'],
            'genre'         => $data['genre'],
            'durasi'        => $data['durasi'],
            'format'        => $data['format'],
            'cover'         => $data['cover']
        ]);
    }
    public function getAudio()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Audio::all();
        return $data;
    }
}
