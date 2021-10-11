<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengarangRequest;
use App\Http\Requests\UserRequest;
use App\Models\pengarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PengarangController extends Controller
{
    public function regisPengarang(PengarangRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Pengarang::create([
            'nama_pengarang' => $data['nama_pengarang'],

        ]);
    }
    public function getPengarang()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = pengarang::all();
        return $data;
    }
}
