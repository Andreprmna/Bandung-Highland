<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertiesRequest;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = properties::paginate();

        return view('admin.property.properties', [
            'properties' => $properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create-property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertiesRequest $request)
    {
        $data = $request->all();

        $check = $this->createProperties($data);

        return redirect()->route("properties.index");
    }

    public function createProperties(array $data)
    {
        return properties::create([
            'nama_property' => $data['nama_property']

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
    public function edit(Properties $property)
    {
        return view('admin.property.edit-property', [
            'item' => $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Properties $property)
    {


        $data = $request->all();

        $property->update($data);

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Properties $property)
    {
        $property->status = 0;

        $property->save();

        return redirect()->route('properties.index');
    }
}
