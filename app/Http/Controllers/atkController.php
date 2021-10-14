<?php

namespace App\Http\Controllers;

use App\Http\Requests\atkRequest;
use App\Models\Atk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class atkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $atk = Atk::paginate();

            return view('admin.atk.atks', [
                'atk' => $atk
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
        return view('admin.atk.create-atk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(atkRequest $request)
    {
        $data = $request->all();

        $check = $this->createAtk($data);

        return redirect()->route("atks.index");
    }

    public function createAtk(array $data)
    {
        return Atk::create([
            'nama_atk' => $data['nama_atk'],
            'harga' => $data['harga'],
            'jumlah' => $data['jumlah'],
            'deskripsi_atk' => $data['deskripsi_atk']

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
    public function edit(Atk $atk)
    {
        return view('admin.atk.edit-atk', [
            'item' => $atk
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atk $atk)
    {
        $data = $request->all();

        $atk->update($data);

        return redirect()->route('atks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atk $atk)
    {
        $atk->delete();

        return redirect()->route('atks.index');
    }
}
