<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $buku = Buku::paginate();

            return view('admin.buku.buku', [
                'buku' => $buku
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
        return view('admin.buku.create-buku');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        $data = $request->all();

        $check = $this->createBuku($data);

        return redirect()->route("bukus.index");
    }

    public function createBuku(array $data)
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
            'bentuk'        => $data['bentuk']

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
    public function edit(Buku $buku)
    {
        return view('admin.buku.edit-buku', [
            'item' => $buku
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $data = $request->all();

        $buku->update($data);

        return redirect()->route('bukus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('bukus.index');
    }
}
