<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pinjam_audioRequest;
use App\Models\Audio;
use App\Models\Pinjam_audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pinjam_audioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $pinjam_audio = Pinjam_audio::paginate();

            return view('admin.pinjam_audio.pinjam_audio', [
                'pinjam_audio' => $pinjam_audio
            ]);
        }

        return redirect('cms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pinjam_audio.create-pinjam_audio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Pinjam_audioRequest $request)
    {
        $data = $request->all();

        $check = $this->createPinjam_audio($data);

        return redirect()->route("pinjam_audios.index");
    }

    public function createPinjam_audio(array $data)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjam_audio $pinjam_audio)
    {
        return view('admin.pinjam_audio.edit-pinjam_audio', [
            'item' => $pinjam_audio
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam_audio $pinjam_audio)
    {
        $data = $request->all();

        $pinjam_audio->update($data);

        return redirect()->route('pinjam_audios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam_audio $pinjam_audio)
    {
        $pinjam_audio->delete();

        return redirect()->route('pinjam_audios.index');
    }
}