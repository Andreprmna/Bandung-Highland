<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pinjam_bukuRequest;
use App\Models\Pinjam_buku;
use Illuminate\Http\Request;

class Pinjam_bukuController extends Controller
{
    public function regisPinjam_Buku(Pinjam_bukuRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Pinjam_buku::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_buku'         => $data['id_buku'],
            'tgl_pinjam'   => $data['tgl_pinjam'],
            'tgl_kembali'       => $data['tgl_kembali'],
            'tgl_pengembalian'  => $data['tgl_pengembalian'],
            'denda'     => $data['denda']

        ]);
    }
}
