<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_video_Request;
use App\Models\Booking_video;
use App\Models\Member;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Booking_video_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_video = Booking_video::with('member', 'admin', 'video')->paginate();

        return view('admin.video.list-booking-video', [
            'booking_video' => $booking_video
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
        $user = User::paginate();
        $video = Video::paginate();
        return view('admin.video.booking-video', [
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
    public function store(Booking_video_Request $request)
    {
        $data = $request->all();

        $check = $this->createVideo($data);

        return redirect()->route("booking_videos.index");
    }

    public function createVideo(array $data)
    {
        return Booking_video::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_video'    => $data['id_video'],
            'tgl_mulai'   => $data['tgl_mulai'],
            'tgl_selesai' => $data['tgl_selesai']

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
    public function edit(Booking_video $booking_video)
    {
        $member = Member::paginate();
        $user = User::paginate();
        $video = Video::paginate();
        return view('admin.booking_video.edit-booking_video', [
            'item' => $booking_video,
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
    public function update(Request $request, Booking_video $booking_video)
    {
        $data = $request->all();

        $booking_video->update($data);

        return redirect()->route('booking_videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_video $booking_video)
    {
        $booking_video->delete();

        return redirect()->route('booking_videos.index');
    }
}
