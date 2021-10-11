<?php

namespace App\Http\Controllers;

use App\Http\Requests\point_of_sellRequest;
use App\Models\Point_of_sell;
use Illuminate\Http\Request;

class point_of_sellController extends Controller
{
    public function regisPoint_off_sell(point_of_sellRequest $request)
    {
        $data = $request->all();

        // $check = $this->create($data);

        // return redirect("dashboard")->withSuccess('You have signed-in');

        return $this->create($data);
    }


    public function create(array $data)
    {
        return Point_of_sell::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_atk'         => $data['id_atk'],
            'jumlah_pos'   => $data['jumlah_pos'],
            'total_harga'       => $data['total_harga'],
            'tgl_pos'  => $data['tgl_pos']

        ]);
    }
}
