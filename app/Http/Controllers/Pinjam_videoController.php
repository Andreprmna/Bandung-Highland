<?php

namespace App\Http\Controllers;

use App\Http\Requests\pinjam_toyRequest;
use App\Http\Requests\Pinjam_videoRequest;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Pinjam_video;
use App\Models\Toy;
use App\Models\User;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pinjam_videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam_video = Pinjam_video::with('member', 'admin', 'video')->paginate();

        return view('admin.video.list-pinjam-video', [
            'pinjam_video' => $pinjam_video
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
        $video = Video::paginate();
        return view('admin.video.pinjam-video', [
            'member' => $member,
            'user' => $user,
            'video' => $video
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Pinjam_videoRequest $request)
    {
        $data = $request->all();

        Pinjam_video::create($data);
        // $check = $this->createPinjam_Video($data);

        return redirect()->route("pinjam_videos.index");
    }

    public function createPinjam_Video(array $data)
    {
        $pinjam = Pinjam_video::where('id_video', $data['id_video'])->wherebetween('tgl_pinjam', [$data['tgl_pinjam'], $data['tgl_kembali']])->first();
        if ($pinjam == null) {
            return Pinjam_video::create([
                'id_member'  => $data['id_member'],
                'id_admin'   => $data['id_admin'],
                'id_video'         => $data['id_video'],
                'tgl_pinjam'   => $data['tgl_pinjam'],
                'tgl_kembali'       => $data['tgl_kembali'],
                'tgl_pengembalian' => $data['tgl_pengembalian'],
                'denda' => $data['denda']

            ]);
        } else {
            throw new Exception('Toy sudah dipinjam./ tidak ditemukan');
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
    public function edit(Pinjam_video $pinjam_video)
    {
        return view('admin.pinjam_toy.edit-pinjam_toy', [
            'item' => $pinjam_video
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam_video $pinjam_video)
    {
        $video = Video::where('id_video', $pinjam_video['id_video'])->firstOrFail();
        $video->status = 0;
        $video->save();

        $data = $request->all();

        $pinjam_video->update($data);

        return redirect()->route('pinjam_videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam_video $pinjam_video)
    {
        $pinjam_video->delete();

        return redirect()->route('pinjam_videos.index');
    }
}
