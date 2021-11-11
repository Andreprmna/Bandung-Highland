<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coworking_space_propertiesRequest;
use App\Models\Coworking_space;
use App\Models\Coworking_space_properties;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Coworking_space_propertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $coworking_space_properties = Coworking_space_properties::with('coworking_space', 'properties')->paginate();

            return view('admin.coworking_property.coworking-property', [
                'coworking_space_properties' => $coworking_space_properties
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
        $coworking_space = Coworking_space::paginate();
        $property = Properties::paginate();

        return view('admin.coworking_property.create-coworking-property', [
            'coworking_space' => $coworking_space,
            'property' => $property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Coworking_space_propertiesRequest $request)
    {
        $data = $request->all();

        $check = $this->createCSP($data);

        return redirect()->route("coworking_space_properties.index");
    }

    public function createCSP(array $data)
    {
        return Coworking_space_properties::create([
            'id_cs'  => $data['id_cs'],
            'id_property'   => $data['id_property'],
            'jumlah' => $data['jumlah']
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
    public function edit(Coworking_space_properties $coworking_space_property)
    {
        $coworking_space = Coworking_space::paginate();
        $property = Properties::paginate();

        return view('admin.coworking_property.edit-coworking-property', [
            'item' => $coworking_space_property,
            'coworking_space' => $coworking_space,
            'property' => $property
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coworking_space_properties $coworking_space_property)
    {
        $data = $request->all();

        $coworking_space_property->update($data);

        return redirect()->route('coworking_space_properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coworking_space_properties $coworking_space_properties)
    {
        $coworking_space_properties->delete();

        return redirect()->route('coworking_space_properties.index');
    }
}
