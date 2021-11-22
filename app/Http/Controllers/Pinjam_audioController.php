<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pinjam_audioRequest;
use App\Models\Admin;
use App\Models\Audio;
use App\Models\Member;
use App\Models\Pinjam_audio;
use App\Models\User;
use Exception;
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
        $pinjam_audio = Pinjam_audio::with('member', 'admin', 'audio')->paginate();

        return view('admin.audio.list-pinjam-audio', [
            'pinjam_audio' => $pinjam_audio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::paginate();
        $user = Admin::paginate();
        $audio = Audio::paginate();

        return view('admin.audio.pinjam-audio', [
            'member' => $member,
            'user' => $user,
            'audio' => $audio
        ]);
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

        Pinjam_audio::create($data);
        // $check = $this->createPinjam_audio($data);

        return redirect()->route("pinjam_audios.index");
    }

    public function createPinjam_audio(array $data)
    {
        $pinjam = Pinjam_audio::where('id_audio', $data['id_audio'])->wherebetween('tgl_pinjam', [$data['tgl_pinjam'], $data['tgl_kembali']])->first();
        if ($pinjam == null) {
            return Pinjam_audio::create([
                'id_member'  => $data['id_member'],
                'id_admin'   => $data['id_admin'],
                'id_audio'         => $data['id_audio'],
                'tgl_pinjam'   => $data['tgl_pinjam'],
                'tgl_kembali'       => $data['tgl_kembali'],
                'tgl_pengembalian' => $data['tgl_pengembalian'],
                'denda' => $data['denda']

            ]);
        } else {
            throw new Exception('Audio sudah dipinjam./ tidak ditemukan');
        }
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
        $member = Member::paginate();
        $user = User::paginate();
        $audio = Audio::paginate();

        return view('admin.pinjam_audio.edit-pinjam_audio', [
            'item' => $pinjam_audio,
            'member' => $member,
            'user' => $user,
            'audio' => $audio
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
        $pinjam_audio->status = 0;
        $pinjam_audio->save();

        return redirect()->route('pinjam_audios.index');
    }
}
