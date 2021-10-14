<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertiesRequest;
use App\Models\properties;
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
        if (Auth::check()) {
            $properties = properties::paginate();

            return view('admin.properties.properties', [
                'properties' => $properties
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
        return view('admin.properties.create-properties');
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
    public function edit(properties $properties)
    {
        return view('admin.properties.edit-properties', [
            'item' => $properties
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, properties $properties)
    {
        $data = $request->all();

        $properties->update($data);

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(properties $properties)
    {
        $properties->delete();

        return redirect()->route('properties.index');
    }
}
