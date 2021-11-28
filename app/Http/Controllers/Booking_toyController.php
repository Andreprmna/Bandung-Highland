<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking_toyRequest;
use App\Models\Admin;
use App\Models\Booking_toy;
use App\Models\Member;
use App\Models\pinjam_toy;
use App\Models\Toy;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class Booking_toyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_toy = Booking_toy::with('member', 'admin', 'toy')->paginate();

        return view('admin.toy.list-booking-toy', [
            'booking_toy' => $booking_toy
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
        $booking = Booking_toy::where('id_toy', $data['id_toy'])->where('tgl_mulai', $data['tgl_mulai'])->first();
        $pinjam = pinjam_toy::where('id_toy', $data['id_toy'])->where('tgl_pinjam', $data['tgl_mulai'])->first();
        if ($pinjam == null) {
            if ($booking == null) {
                return Booking_toy::create([
                    'id_member'  => $data['id_member'],
                    'id_admin'   => $data['id_admin'],
                    'id_toy'     => $data['id_toy'],
                    'tgl_mulai'   => $data['tgl_mulai']
                ]);
            } else {
                throw ValidationException::withMessages(['Toy dengan tanggal terpilih telah dibooking']);
            }
        } else {
            throw ValidationException::withMessages(['Toy dengan tanggal terpilih telah dipinjam']);
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
    public function edit(Booking_toy $booking_toy)
    {
        $member = Member::paginate();
        $user = Admin::paginate();
        $toy = Toy::paginate();
        return view('admin.toy.update-booking-toy', [
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

        if ($booking_toy->status == 1) {
            $booking_toy->status = $request->status;
            $booking_toy->save();
        } elseif ($booking_toy->status == 0) {
            $booking_toy->status = 1;
            $booking_toy->id_admin = Auth::guard('admin')->id();
            $booking_toy->save();
        }

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
    public function export_excel()
    {
        return Excel::download(new Booking_toy, 'Booking_toy.xlsx');
    }
}
