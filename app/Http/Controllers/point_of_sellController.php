<?php

namespace App\Http\Controllers;

use App\Http\Requests\point_of_sellRequest;
use App\Models\Point_of_sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class point_of_sellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $point_of_sell = Point_of_sell::paginate();

            return view('admin.point_of_sell.point_of_sell', [
                'point_of_sell' => $point_of_sell
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
        return view('admin.point_of_sell.create-point_of_sell');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(point_of_sellRequest $request)
    {
        $data = $request->all();

        $check = $this->createPinjam_Video($data);

        return redirect()->route("point_of_sells.index");
    }

    public function createPinjam_Video(array $data)
    {
        return Point_of_sell::create([
            'id_member'  => $data['id_member'],
            'id_admin'   => $data['id_admin'],
            'id_atk'         => $data['id_atk'],
            'jumlah_pos'   => $data['jumlah_pos'],
            'total_harga'  => $data['total_harga'],
            'tgl_pos'  => $data['tgl_pos']

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
    public function edit(Point_of_sell $point_of_sell)
    {
        return view('admin.point_of_sells.edit-point_of_sells', [
            'item' => $point_of_sell
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point_of_sell $point_of_sell)
    {
        $data = $request->all();

        $point_of_sell->update($data);

        return redirect()->route('point_of_sells.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point_of_sell $point_of_sell)
    {
        $point_of_sell->delete();

        return redirect()->route('point_of_sells.index');
    }
}
