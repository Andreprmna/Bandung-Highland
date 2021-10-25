<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_video_Request;
use App\Models\Booking_video;
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
        if (Auth::check()) {
            $booking_video = Booking_video::paginate();

            return view('admin.booking_video.booking_video', [
                'booking_video' => $booking_video
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
        return view('admin.booking_video.create-booking_video');
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
        return view('admin.booking_video.edit-booking_video', [
            'item' => $booking_video
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