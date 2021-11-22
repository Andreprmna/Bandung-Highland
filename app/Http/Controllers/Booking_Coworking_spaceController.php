<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_Coworking_spaceRequest;
use App\Models\Admin;
use App\Models\Booking_Coworking_space;
use App\Models\Coworking_space;
use App\Models\Member;
use App\Models\User;
use Exception;
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
        $booking_coworking_space = Booking_Coworking_space::with('member', 'admin', 'coworking_space')->paginate();

        return view('admin.coworking_space.list-booking-coworking-space', [
            'booking_coworking_space' => $booking_coworking_space
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
        $coworking_space = Coworking_space::paginate();

        return view('admin.coworking_space.booking-coworking-space', [
            'member' => $member,
            'user' => $user,
            'coworking_space' => $coworking_space
        ]);
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

        $check = $this->createBCWS($data);

        return redirect()->route("booking_coworking_spaces.index");
    }

    public function createBCWS(array $data)
    {
        $booking = Booking_Coworking_space::where('id_cs', $data['id_cs'])->wherebetween('tgl_mulai', [$data['tgl_mulai'], $data['tgl_selesai']])->first();
        if ($booking == null) {
            return Booking_Coworking_space::create([
                'id_cs' => $data['id_cs'],
                'id_member'  => $data['id_member'],
                'id_admin'   => $data['id_admin'],
                'tgl_mulai'   => $data['tgl_mulai'],
                'tgl_selesai' => $data['tgl_selesai']

            ]);
        } else {
            throw new Exception('Coworking Space sudah dibooking./ tidak ditemukan');
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
    public function edit(Booking_Coworking_space $booking_coworking_space)
    {
        $member = Member::paginate();
        $user = User::paginate();
        $coworking_space = Coworking_space::paginate();

        return view('admin.booking_coworking_space.edit-booking_coworking_space', [
            'item' => $booking_coworking_space,
            'member' => $member,
            'user' => $user,
            'coworking_space' => $coworking_space
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

        return redirect()->route('booking_coworking_spaces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_Coworking_space $booking_coworking_space)
    {
        $booking_coworking_space->status = 0;
        $booking_coworking_space->save();

        return redirect()->route('booking_coworking_spaces.index');
    }
}
