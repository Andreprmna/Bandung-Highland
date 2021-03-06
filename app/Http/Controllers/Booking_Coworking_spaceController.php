<?php

namespace App\Http\Controllers;

use App\Exports\Booking_Coworking_spaceExport;
use App\Http\Requests\Booking_Coworking_spaceRequest;
use App\Models\Admin;
use App\Models\Booking_Coworking_space;
use App\Models\Coworking_space;
use App\Models\Member;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

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
        $booking = Booking_Coworking_space::where('status', 1)->where('id_cs', $data['id_cs'])->whereDate('tgl_mulai', '<=', $data['tgl_mulai'])->whereDate('tgl_selesai', '>=', $data['tgl_mulai'])->first();
        if ($booking == null) {
            return Booking_Coworking_space::create([
                'id_cs' => $data['id_cs'],
                'id_member'  => $data['id_member'],
                'id_admin'   => $data['id_admin'],
                'tgl_mulai'   => $data['tgl_mulai'],
                'tgl_selesai' => $data['tgl_selesai']

            ]);
        } else {
            throw ValidationException::withMessages(['Coworking Space dengan tanggal terpilih telah dibooking']);
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
        $user = Admin::paginate();
        $coworking_space = Coworking_space::paginate();

        return view('admin.coworking_space.update-booking-coworking-space', [
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
    public function update(Request $request, Booking_Coworking_space $booking_coworking_space)
    {
        if ($booking_coworking_space->status == 1) {
            $booking_coworking_space->status = $request->status;
            $booking_coworking_space->save();
        } elseif ($booking_coworking_space->status == 2) {
            $booking_coworking_space->status = 1;
            $booking_coworking_space->id_admin = Auth::guard('admin')->id();
            $booking_coworking_space->save();
        }

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
        $booking_coworking_space->delete();

        return redirect()->route('booking_coworking_spaces.index');
    }
    public function export_excel()
    {
        return Excel::download(new Booking_Coworking_spaceExport, 'Booking_CSP.xlsx');
    }
}
