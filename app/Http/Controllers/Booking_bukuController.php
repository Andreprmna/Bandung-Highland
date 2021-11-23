<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_bukuRequest;
use App\Models\Admin;
use App\Models\Booking_buku;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Pinjam_buku;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Booking_bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_buku = Booking_buku::with('member', 'admin', 'buku')->paginate();

        return view('admin.buku.list-booking-buku', [
            'booking_buku' => $booking_buku
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
        $buku = Buku::paginate();
        return view('admin.buku.booking-buku', [
            'member' => $member,
            'user' => $user,
            'buku' => $buku,
        ]);
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

        $check = $this->createBooking_buku($data);

        return redirect()->route("booking_bukus.index");
    }

    public function createBooking_buku(array $data)
    {
        $booking = Booking_buku::where('id_buku', $data['id_buku'])->whereDate('tgl_mulai', '<=', $data['tgl_mulai'])->whereDate('tgl_selesai', '>=', $data['tgl_mulai'])->first();
        $pinjam = Pinjam_buku::where('id_buku', $data['id_buku'])->whereDate('tgl_pinjam', '<=', $data['tgl_mulai'])->whereDate('tgl_kembali', '>=', $data['tgl_mulai'])->first();
        if ($pinjam == null) {
            if ($booking == null) {
                return Booking_buku::create([
                    'id_member'  => $data['id_member'],
                    'id_admin'   => $data['id_admin'],
                    'id_buku'     => $data['id_buku'],
                    'tgl_mulai'   => $data['tgl_mulai'],
                    'tgl_selesai' => $data['tgl_selesai']

                ]);
            } else {
                throw ValidationException::withMessages(['Buku dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Buku dengan tanggal terpilih telah dipinjam']);
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
    public function edit(Booking_buku $booking_buku)
    {
        $member = Member::paginate();
        $user = User::paginate();
        $buku = Buku::paginate();
        return view('admin.booking_buku.edit-booking_buku', [
            'item' => $booking_buku,
            'member' => $member,
            'user' => $user,
            'buku' => $buku,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking_buku $booking_buku)
    {

        $data = $request->all();

        $booking_buku->update($data);

        return redirect()->route('booking_bukus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_buku $booking_buku)
    {
        $booking_buku->status = 0;
        $booking_buku->save();

        return redirect()->route('booking_bukus.index');
    }
}
