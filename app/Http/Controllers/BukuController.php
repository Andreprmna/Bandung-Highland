<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
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
        $buku = Buku::with('pengarang', 'penerbit')->paginate();

        return view('admin.buku.bukus', [
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengarang = Pengarang::paginate();
        $penerbit = Penerbit::paginate();

        return view('admin.buku.create-buku', [
            'pengarang' => $pengarang,
            'penerbit' => $penerbit
        ]);
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

        if ($request->file('sampul') != null) {
            $data['sampul'] = $request->file('sampul')->store('assets/buku', 'public');
        }

        Buku::create($data);
        // $check = $this->createBuku($data);

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
            'sampul'        => $data['sampul'],
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
        $pengarang = Pengarang::paginate();
        $penerbit = Penerbit::paginate();

        return view('admin.buku.edit-buku', [
            'item' => $buku,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
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

        if ($request->file('sampul') != null) {
            $data['sampul'] = $request->file('sampul')->store('assets/buku', 'public');
        }

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
        $buku->status = 0;
        $buku->save();

        return redirect()->route('bukus.index');
    }
}
