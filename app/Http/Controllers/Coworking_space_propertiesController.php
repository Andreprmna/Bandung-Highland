<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coworking_space_propertiesRequest;
use App\Models\Coworking_space_properties;
use Illuminate\Http\Request;

class Coworking_space_propertiesController extends Controller
{
    public function regis_CSP(Coworking_space_propertiesRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Coworking_space_properties::create([
            'id_property'  => $data['id_property'],
            'id_cs'   => $data['id_cs']

        ]);
    }
    public function getCSP()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Coworking_space_properties::all();
        return $data;
    }
}
