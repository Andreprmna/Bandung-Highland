<?php

namespace App\Http\Controllers;

use App\Http\Requests\pinjam_toyRequest;
use App\Models\pinjam_toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pinjam_toyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $pinjam_toy = pinjam_toy::paginate();

            return view('admin.pinjam_toy.pinjam_toy', [
                'pinjam_toy' => $pinjam_toy
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
        return view('admin.pinjam_toy.create-pinjam_toy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pinjam_toyRequest $request)
    {
        $data = $request->all();

        $check = $this->createPinjam_Toy($data);

        return redirect()->route("pinjam_toys.index");
    }

    public function createPinjam_Toy(array $data)
    {
        return pinjam_toy::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_toy'         => $data['id_toy'],
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
    public function edit(pinjam_toy $pinjam_toy)
    {
        return view('admin.pinjam_toy.edit-pinjam_toy', [
            'item' => $pinjam_toy
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pinjam_toy $pinjam_toy)
    {
        $data = $request->all();

        $pinjam_toy->update($data);

        return redirect()->route('pinjam_toys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pinjam_toy $pinjam_toy)
    {
        $pinjam_toy->delete();

        return redirect()->route('pinjam_toys.index');
    }
}
