<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_bukuRequest;
use App\Models\Booking_buku;
use App\Models\Buku;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Booking_bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $booking_buku = Booking_buku::with('member', 'admin', 'buku')->paginate();

            return view('admin.booking_buku.booking_bukus', [
                'booking_bukus' => $booking_buku
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
        $member = Member::paginate();
        $user = User::paginate();
        $buku = Buku::paginate();
        return view('admin.booking_buku.create-booking_buku', [
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
        return Booking_buku::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_buku'     => $data['id_buku'],
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
        $booking_buku->delete();

        return redirect()->route('booking_bukus.index');
    }
}
