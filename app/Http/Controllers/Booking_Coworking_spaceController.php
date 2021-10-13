<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_Coworking_spaceRequest;
use App\Models\Booking_Coworking_space;
use App\Models\Booking_coworking_space as ModelsBooking_coworking_space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Booking_Coworking_spaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $booking_coworking_space = Booking_Coworking_space::paginate();

            return view('admin.booking_coworking_space.booking_coworking_spaces', [
                'booking_coworking_spaces' => $booking_coworking_space
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
        return view('admin.booking_coworking_space.create-booking_coworking_space');
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

        $check = $this->createPenerbit($data);

        return redirect()->route("booking_coworking_spaces.index");
    }

    public function createPenerbit(array $data)
    {
        return Booking_Coworking_space::create([
            'id_cs' => $data['id_cs'],
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
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
    public function edit(Booking_Coworking_space $booking_coworking_space)
    {
        return view('admin.booking_coworking_space.edit-booking_coworking_space', [
            'item' => $booking_coworking_space
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking_Coworking_space $booking_Coworking_space)
    {
        $data = $request->all();

        $booking_Coworking_space->update($data);

        return redirect()->route('booking_Coworking_spaces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_Coworking_space $booking_Coworking_space)
    {
        $booking_Coworking_space->delete();

        return redirect()->route('booking_Coworking_spaces.index');
    }
}
