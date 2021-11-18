<?php

namespace App\Http\Controllers;

use App\Http\Requests\AudioRequest;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audio = Audio::paginate();

        return view('admin.audio.audios', [
            'audio' => $audio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.audio.create-audio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AudioRequest $request)
    {
        $data = $request->all();

        if ($request->file('cover') != null) {
            $data['cover'] = $request->file('cover')->store('assets/audio', 'public');
        }

        Audio::create($data);

        // $check = $this->CreateAudio($data);

        return redirect()->route("audios.index");
    }

    public function CreateAudio(array $data)
    {
        return Audio::create([
            'judul' => $data['judul'],
            'pengisi_suara' => $data['pengisi_suara'],
            'tahun_rilis' => $data['tahun_rilis'],
            'genre' => $data['genre'],
            'durasi' => $data['durasi'],
            'format' => $data['format'],
            'cover' => $data['cover']

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
    public function edit(Audio $audio)
    {
        return view('admin.audio.edit-audio', [
            'item' => $audio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audio $audio)
    {
        $data = $request->all();

        if ($request->file('cover') != null) {
            $data['cover'] = $request->file('cover')->store('assets/audio', 'public');
        }

        $audio->update($data);

        return redirect()->route('audios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        $audio->status = 0;
        $audio->save();

        return redirect()->route('audios.index');
    }
}
