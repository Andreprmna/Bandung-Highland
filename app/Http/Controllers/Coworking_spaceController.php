<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coworking_spaceRequest;
use App\Models\Coworking_space;
use Illuminate\Http\Request;

class Coworking_spaceController extends Controller
{
    public function regisCoworking_space(Coworking_spaceRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }
    public function create(array $data)
    {
        return Coworking_space::create([
            'nomor_cs'       => $data['nomor_cs'],
            'deskripsi_cs'   => $data['deskripsi_cs'],
            'daya_tampung'   => $data['daya_tampung']

        ]);
    }
}
