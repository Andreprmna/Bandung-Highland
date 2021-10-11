<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertiesRequest;
use App\Models\properties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function regisProperties(PropertiesRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return properties::create([
            'nama_property' => $data['nama_property'],

        ]);
    }
    public function getproperties()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = properties::all();
        return $data;
    }
}
