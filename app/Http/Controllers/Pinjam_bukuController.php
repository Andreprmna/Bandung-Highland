<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pinjam_bukuRequest;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Pinjam_buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pinjam_bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $pinjam_buku = Pinjam_buku::with('member', 'user', 'buku')->paginate();

            return view('admin.pinjam_buku.pinjam_buku', [
                'pinjam_buku' => $pinjam_buku
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
        $buku = Buku::paginate();
        return view('admin.pinjam_buku.create-pinjam_buku', [
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
        $user = User::paginate();
        $buku = Buku::paginate();
        return view('admin.pinjam_buku.edit-pinjam_buku', [
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
        $data = $request->all();

        $pinjam_buku->update($data);

        return redirect()->route('pinjam_bukus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam_buku $pinjam_bukus)
    {
        $pinjam_bukus->delete();

        return redirect()->route('pinjam_bukus.index');
    }
}
