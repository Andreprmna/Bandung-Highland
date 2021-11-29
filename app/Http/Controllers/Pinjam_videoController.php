<?php

namespace App\Http\Controllers;

use App\Exports\Pinjam_videoExport;
use App\Http\Requests\pinjam_toyRequest;
use App\Http\Requests\Pinjam_videoRequest;
use App\Models\Admin;
use App\Models\Booking_video;
use App\Models\Member;
use App\Models\Pinjam_video;
use App\Models\Toy;
use App\Models\User;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

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

        $check = $this->createPinjam_Video($data);

        return redirect()->route("pinjam_videos.index");
    }

    public function createPinjam_Video(array $data)
    {
        $booking = Booking_video::where('status', 1)->where('id_video', $data['id_video'])->whereDate('tgl_mulai', '<=', $data['tgl_pinjam'])->whereDate('tgl_selesai', '>=', $data['tgl_pinjam'])->first();
        $pinjam = Pinjam_video::where('status', 1)->where('id_video', $data['id_video'])->whereDate('tgl_pinjam', '<=', $data['tgl_pinjam'])->whereDate('tgl_kembali', '>=', $data['tgl_pinjam'])->first();
        if ($pinjam == null) {
            if ($booking == null) {
                return Pinjam_video::create([
                    'id_member'  => $data['id_member'],
                    'id_admin'   => $data['id_admin'],
                    'id_video'         => $data['id_video'],
                    'tgl_pinjam'   => $data['tgl_pinjam'],
                    'tgl_kembali'       => $data['tgl_kembali']

                ]);
            } else {
                throw ValidationException::withMessages(['Video dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Video dengan tanggal terpilih telah dipinjam']);
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
        $member = Member::paginate();
        $user = Admin::paginate();
        $video = Video::paginate();

        return view('admin.video.return-pinjam-video', [
            'item' => $pinjam_video,
            'member' => $member,
            'user' => $user,
            'video' => $video
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
        $pinjam_video->tgl_pengembalian = $request->tgl_pengembalian;
        $pinjam_video->denda = $request->denda;
        $pinjam_video->status = 0;
        $pinjam_video->save();

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
        $pinjam_video->status = 0;
        $pinjam_video->save();

        return redirect()->route('pinjam_videos.index');
    }
    public function export_excel()
    {
        return Excel::download(new Pinjam_videoExport, 'Pinjam_video.xlsx');
    }
}
