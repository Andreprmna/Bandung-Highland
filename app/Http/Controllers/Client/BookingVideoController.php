<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking_video_Request;
use App\Models\Audio;
use App\Models\Booking_video;
use App\Models\Pinjam_video;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class BookingVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::paginate();

        return view('booking.video.list-booking-video', [
            'video' => $video
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data['id_member'] = Auth::guard('web')->id();
        $data['id_admin'] = 0;
        $data['status'] = 0;

        $booking = Booking_video::where('id_video', $data['id_video'])->whereDate('tgl_mulai', '<=', $data['tgl_mulai'])->whereDate('tgl_selesai', '>=', $data['tgl_mulai'])->first();
        $pinjam = Pinjam_video::where('id_video', $data['id_video'])->whereDate('tgl_pinjam', '<=', $data['tgl_mulai'])->whereDate('tgl_kembali', '>=', $data['tgl_mulai'])->first();

        if ($pinjam == null) {
            if ($booking == null) {
                if (Auth::guard('web')->check()) {
                    Booking_video::create($data);

                    Alert::success('Booked', 'Booking Successful!');
                    return redirect()->route("video.index");
                }
                
                return redirect()->route("login");
            } else {
                throw ValidationException::withMessages(['Video dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Video dengan tanggal terpilih telah dipinjam']);
        }

        return redirect()->route("video.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('booking.video.form-booking-video', [
            'item' => $video,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
