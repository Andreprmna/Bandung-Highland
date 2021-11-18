<?php

namespace App\Http\Controllers;

use App\Http\Requests\point_of_sellRequest;
use App\Models\Atk;
use App\Models\Member;
use App\Models\Point_of_sell;
use App\Models\User;
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
        $point_of_sell = Point_of_sell::with('member', 'admin', 'atk')->paginate();

        return view('admin.atk.list-atk', [
            'point_of_sell' => $point_of_sell
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::paginate();
        $user = User::paginate();
        $atk = Atk::paginate();
        
        return view('admin.atk.beli-atk', [
            'member' => $member,
            'user' => $user,
            'atk' => $atk
        ]);
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

        $check = $this->createPOS($data);

        return redirect()->route("point_of_sells.index");
    }

    public function createPOS(array $data)
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
        // $member = Member::paginate();
        // $user = User::paginate();
        // $atk = Atk::paginate();

        // return view('admin.atk.edit-atk', [
        //     'item' => $point_of_sell,
        //     'member' => $member,
        //     'user' => $user,
        //     'atk' => $atk
        // ]);
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
        // $data = $request->all();

        // $point_of_sell->update($data);

        // return redirect()->route('point_of_sells.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point_of_sell $point_of_sell)
    {
        // $point_of_sell->delete();

        // return redirect()->route('point_of_sells.index');
    }
}
