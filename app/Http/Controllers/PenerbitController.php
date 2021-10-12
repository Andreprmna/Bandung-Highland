<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenerbitRequest;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $penerbit = Penerbit::paginate();

            return view('admin.penerbit.penerbits', [
                'penerbit' => $penerbit
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
        return view('admin.penerbit.create-penerbit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenerbitRequest $request)
    {
        $data = $request->all();

        $check = $this->createPenerbit($data);

        return redirect()->route("penerbits.index");
    }

    public function createPenerbit(array $data)
    {
        return Penerbit::create([
            'nama_penerbit' => $data['nama_penerbit'],

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
    public function edit(Penerbit $penerbit)
    {
        return view('admin.penerbit.edit-penerbit', [
            'item' => $penerbit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $data = $request->all();

        $penerbit->update($data);

        return redirect()->route('penerbits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

        return redirect()->route('penerbits.index');
    }
}

