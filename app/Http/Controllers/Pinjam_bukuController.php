<?php

namespace App\Http\Controllers;

use App\Exports\Pinjam_bukuExport;
use App\Http\Requests\Pinjam_bukuRequest;
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
use Maatwebsite\Excel\Facades\Excel;

class Pinjam_bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam_buku = Pinjam_buku::with('member', 'admin', 'buku')->paginate();

        return view('admin.buku.list-pinjam-buku', [
            'pinjam_buku' => $pinjam_buku
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
        return view('admin.buku.pinjam-buku', [
            'member' => $member,
            'user' => $user,
            'buku' => $buku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Pinjam_bukuRequest $request)
    {
        $data = $request->all();

        $check = $this->createPinjam_Buku($data);

        return redirect()->route("pinjam_bukus.index");
    }

    public function createPinjam_Buku(array $data)
    {
        $booking = Booking_buku::where('status', 1)->where('id_buku', $data['id_buku'])->whereDate('tgl_mulai', '<=', $data['tgl_pinjam'])->whereDate('tgl_selesai', '>=', $data['tgl_pinjam'])->first();
        $pinjam = Pinjam_buku::where('status', 1)->where('id_buku', $data['id_buku'])->whereDate('tgl_pinjam', '<=', $data['tgl_pinjam'])->whereDate('tgl_kembali', '>=', $data['tgl_pinjam'])->first();
        if ($pinjam == null) {
            if ($booking == null) {
                return Pinjam_buku::create([
                    'id_member'  => $data['id_member'],
                    'id_admin'   => $data['id_admin'],
                    'id_buku'         => $data['id_buku'],
                    'tgl_pinjam'   => $data['tgl_pinjam'],
                    'tgl_kembali'       => $data['tgl_kembali']
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
    public function edit(Pinjam_buku $pinjam_buku)
    {
        $member = Member::paginate();
        $user = Admin::paginate();
        $buku = Buku::paginate();
        return view('admin.buku.return-pinjam-buku', [
            'item' => $pinjam_buku,
            'member' => $member,
            'user' => $user,
            'buku' => $buku
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam_buku $pinjam_buku)
    {

        $pinjam_buku->tgl_pengembalian = $request->tgl_pengembalian;
        $pinjam_buku->denda = $request->denda;
        $pinjam_buku->status = 0;
        $pinjam_buku->save();

        return redirect()->route('pinjam_bukus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam_buku $pinjam_buku)
    {
        $pinjam_buku->status = 0;
        $pinjam_buku->save();

        return redirect()->route('pinjam_bukus.index');
    }
    public function export_excel()
    {
        return Excel::download(new Pinjam_bukuExport, 'Pinjam_buku.xlsx');
    }
}
