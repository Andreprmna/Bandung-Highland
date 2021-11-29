<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking_bukuRequest;
use App\Models\Booking_buku;
use App\Models\Buku;
use App\Models\Pinjam_buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class BookingBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::with('pengarang', 'penerbit')->paginate(5);

        return view('booking.buku.list-booking-buku', [
            'buku' => $buku
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
    public function store(Booking_bukuRequest $request)
    {
        $data = $request->all();
        $data['id_member'] = Auth::guard('web')->id();
        $data['id_admin'] = 0;
        $data['status'] = 2;

        $booking = Booking_buku::where('status', 1)->where('id_buku', $data['id_buku'])->whereDate('tgl_mulai', '<=', $data['tgl_mulai'])->whereDate('tgl_selesai', '>=', $data['tgl_mulai'])->first();
        $pinjam = Pinjam_buku::where('status', 1)->where('id_buku', $data['id_buku'])->whereDate('tgl_pinjam', '<=', $data['tgl_mulai'])->whereDate('tgl_kembali', '>=', $data['tgl_mulai'])->first();

        if ($pinjam == null) {
            if ($booking == null) {
                if (Auth::guard('web')->check()) {
                    Booking_buku::create($data);

                    Alert::success('Booked', 'Booking Successful!');
                    return redirect()->route("buku.index");
                }
                
                return redirect()->route("login");
            } else {
                throw ValidationException::withMessages(['Buku dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Buku dengan tanggal terpilih telah dipinjam']);
        }

        return redirect()->route("buku.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('booking.buku.form-booking-buku', [
            'item' => $buku,
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
