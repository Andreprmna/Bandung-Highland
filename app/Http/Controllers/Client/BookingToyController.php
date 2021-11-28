<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking_toyRequest;
use App\Models\Booking_toy;
use App\Models\pinjam_toy;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class BookingToyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toy = Toy::paginate();

            return view('booking.toy.list-booking-toy', [
                'toy' => $toy
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
    public function store(Booking_toyRequest $request)
    {
        $data = $request->all();
        $data['id_member'] = Auth::guard('web')->id();
        $data['id_admin'] = 0;
        $data['status'] = 0;

        $booking = Booking_toy::where('id_toy', $data['id_toy'])->where('tgl_mulai', [$data['tgl_mulai']])->first();
        $pinjam = pinjam_toy::where('id_toy', $data['id_toy'])->where('tgl_pinjam', [$data['tgl_mulai']])->first();

        if ($pinjam == null) {
            if ($booking == null) {
                if (Auth::guard('web')->check()) {
                    Booking_toy::create($data);

                    Alert::success('Booked', 'Booking Successful!');
                    return redirect()->route("toy.index");
                }
                
                return redirect()->route("login");
            } else {
                throw ValidationException::withMessages(['Toy dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Toy dengan tanggal terpilih telah dipinjam']);
        }

        return redirect()->route("toy.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Toy $toy)
    {
        return view('booking.toy.form-booking-toy', [
            'item' => $toy,
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
