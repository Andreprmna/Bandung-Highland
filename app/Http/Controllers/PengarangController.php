<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengarangRequest;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengarang = Pengarang::paginate();

        return view('admin.pengarang.pengarangs', [
            'pengarang' => $pengarang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengarang.create-pengarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengarangRequest $request)
    {
        $data = $request->all();

        $check = $this->createPengarang($data);

        return redirect()->route("pengarangs.index");
    }

    public function createPengarang(array $data)
    {
        return Pengarang::create([
            'nama_pengarang' => $data['nama_pengarang'],

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
    public function edit(Pengarang $pengarang)
    {
        return view('admin.pengarang.edit-pengarang', [
            'item' => $pengarang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengarang $pengarang)
    {
        $pengarangs = Pengarang::where('id_pengarang', $pengarang['id_pengarang'])->firstOrFail();
        $pengarangs->status = 0;
        $pengarangs->save();
        $data = $request->all();

        $pengarang->update($data);

        return redirect()->route('pengarangs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengarang $pengarang)
    {
        $pengarang->delete();

        return redirect()->route('pengarangs.index');
    }
}
