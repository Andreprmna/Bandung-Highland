<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_toyRequest;
use App\Models\Booking_toy;
use App\Models\Member;
use App\Models\Toy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Booking_toyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $booking_toy = Booking_toy::with('member', 'admin', 'toy')->paginate();

            return view('admin.toy.list-booking-toy', [
                'booking_toy' => $booking_toy
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
        $toy = Toy::paginate();
        return view('admin.toy.booking-toy', [
            'member' => $member,
            'user' => $user,
            'toy' => $toy
        ]);
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

        $check = $this->createToy($data);

        return redirect()->route("booking_toys.index");
    }

    public function createToy(array $data)
    {
        return Booking_toy::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_toy'    => $data['id_toy'],
            'tgl_mulai'   => $data['tgl_mulai']
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
    public function edit(Booking_toy $booking_toy)
    {
        $member = Member::paginate();
        $user = User::paginate();
        $toy = Toy::paginate();
        return view('admin.booking_toy.edit-booking_toy', [
            'item' => $booking_toy,
            'member' => $member,
            'user' => $user,
            'toy' => $toy
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking_toy $booking_toy)
    {
        $data = $request->all();

        $booking_toy->update($data);

        return redirect()->route('booking_toys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_toy $booking_toy)
    {
        $booking_toy->delete();

        return redirect()->route('booking_toys.index');
    }
}
