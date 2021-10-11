<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenerbitRequest;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function regisPenerbit(PenerbitRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Penerbit::create([
            'nama_penerbit' => $data['nama_penerbit'],

        ]);
    }
    public function getPenerbit()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Penerbit::all();
        return $data;
    }
}
