<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToyRequest;
use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    public function regisToy(ToyRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Toy::create([
            'nama_toy'  => $data['nama_toy'],
            'jenis'     => $data['jenis'],
            'genre'     => $data['genre'],
            'kondisi'   => $data['kondisi']

        ]);
    }
}
