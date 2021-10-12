<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function regisBuku(BukuRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Buku::create([
            'id_pengarang'  => $data['id_pengarang'],
            'id_penerbit'   => $data['id_penerbit'],
            'judul'         => $data['judul'],
            'tahun_rilis'   => $data['tahun_rilis'],
            'halaman'       => $data['halaman'],
            'isbn'          => $data['isbn'],
            'deskripsi'     => $data['deskripsi'],
            'sampul_photo'  => $data['sampul_photo'],
            'bentuk'        => $data['bentuk'],

        ]);
    }
    public function getBuku()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Buku::all();
        return $data;
    }
}
