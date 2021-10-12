<?php

namespace App\Http\Controllers;

use App\Http\Requests\atkRequest;
use App\Models\Atk;
use Illuminate\Http\Request;

class atkController extends Controller
{
    public function regisAtk(atkRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Atk::create([
            'nama_atk'      => $data['nama_atk'],
            'harga'         => $data['harga'],
            'jumlah'        => $data['jumlah'],
            'deskripsi_atk' => $data['deskripsi_atk']
        ]);
    }
    public function get_atk()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = Atk::all();
        return $data;
    }
}
