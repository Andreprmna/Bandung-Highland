<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coworking_spaceRequest;
use App\Models\Coworking_space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Coworking_spaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $coworking_space = Coworking_space::paginate();

            return view('admin.coworking_space.coworking-space', [
                'coworking_space' => $coworking_space
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
        return view('admin.coworking_space.create-coworking-space');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Coworking_spaceRequest $request)
    {
        $data = $request->all();

        $check = $this->createCWS($data);

        return redirect()->route("coworking_spaces.index");
    }

    public function createCWS(array $data)
    {
        return Coworking_space::create([
            'nomor_cs'  => $data['nomor_cs'],
            'deskripsi_cs'   => $data['deskripsi_cs'],
            'daya_tampung'   => $data['daya_tampung']


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
    public function edit(Coworking_space $coworking_space)
    {
        return view('admin.coworking_space.edit-coworking-space', [
            'item' => $coworking_space
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coworking_space $coworking_space)
    {
        $data = $request->all();

        $coworking_space->update($data);

        return redirect()->route('coworking_spaces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coworking_space $coworking_space)
    {
        $coworking_space->delete();

        return redirect()->route('coworking_spaces.index');
    }
}
