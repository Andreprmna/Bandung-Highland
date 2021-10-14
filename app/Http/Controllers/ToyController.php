<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToyRequest;
use App\Models\Toy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $toy = Toy::paginate();

            return view('admin.toy.toys', [
                'toy' => $toy
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
        return view('admin.toy.create-toy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToyRequest $request)
    {
        $data = $request->all();

        $check = $this->createToy($data);

        return redirect()->route("toys.index");
    }

    public function createToy(array $data)
    {
        return Toy::create([
            'nama_toy'  => $data['nama_toy'],
            'jenis'     => $data['jenis'],
            'genre'     => $data['genre'],
            'deskripsi'   => $data['deskripsi']
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
    public function edit(Toy $toy)
    {
        return view('admin.toy.edit-toy', [
            'item' => $toy
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toy $toy)
    {
        $data = $request->all();

        $toy->update($data);

        return redirect()->route('toys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toy $toy)
    {
        $toy->delete();

        return redirect()->route('toys.index');
    }
}
