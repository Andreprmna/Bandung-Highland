<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking_Coworking_spaceRequest;
use App\Models\Booking_coworking_space;
use App\Models\Coworking_space;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class BookingCoSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coworking_space = Coworking_space::paginate();

            return view('booking.coworking_space.list-booking-cospace', [
                'coworking_space' => $coworking_space
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
    public function store(Booking_Coworking_spaceRequest $request)
    {
        $data = $request->all();
        $data['id_member'] = Auth::guard('web')->id();
        $data['id_admin'] = 0;
        $data['status'] = 0;

        $booking = Booking_Coworking_space::where('id_cs', $data['id_cs'])->whereDate('tgl_mulai', '<=', $data['tgl_mulai'])->whereDate('tgl_selesai', '>=', $data['tgl_mulai'])->first();

        if ($booking == null) {
            if (Auth::guard('web')->check()) {
                Booking_coworking_space::create($data);

                Alert::success('Booked', 'Booking Successful!');
                return redirect()->route("coworking-space.index");
            }
            
            return redirect()->route("login");
        } else {
            throw ValidationException::withMessages(['Video dengan tanggal terpilih telah dibooking']);
        }

        return redirect()->route("coworking-space.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coworking_space $coworking_space)
    {
        return view('booking.coworking_space.form-booking-cospace', [
            'item' => $coworking_space,
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
