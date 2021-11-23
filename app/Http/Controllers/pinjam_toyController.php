<?php

namespace App\Http\Controllers;

use App\Http\Requests\pinjam_toyRequest;
use App\Models\Admin;
use App\Models\Member;
use App\Models\pinjam_toy;
use App\Models\Toy;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class pinjam_toyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam_toy = pinjam_toy::with('member', 'admin', 'toy')->paginate();

        return view('admin.toy.list-pinjam-toy', [
            'pinjam_toy' => $pinjam_toy
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
        $user = Admin::paginate();
        $toy = Toy::paginate();
        return view('admin.toy.pinjam-toy', [
            'member' => $member,
            'user' => $user,
            'toy' => $toy
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pinjam_toyRequest $request)
    {
        $data = $request->all();

        $check = $this->createPinjam_Toy($data);

        return redirect()->route("pinjam_toys.index");
    }

    public function createPinjam_Toy(array $data)
    {
        $pinjam = pinjam_toy::where('id_toy', $data['id_toy'])->where('tgl_pinjam', $data['tgl_pinjam'])->first();
        if ($pinjam == null) {
            return pinjam_toy::create([
                'id_member'  => $data['id_member'],
                'id_admin'   => $data['id_admin'],
                'id_toy'         => $data['id_toy'],
                'tgl_pinjam'   => $data['tgl_pinjam'],
                'tgl_pengembalian'  => $data['tgl_pengembalian']

            ]);
        } else {
            throw ValidationException::withMessages(['Toy dengan tanggal terpilih telah dipinjam']);
        }
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
    public function edit(pinjam_toy $pinjam_toy)
    {
        $member = Member::paginate();
        $user = User::paginate();
        $toy = Toy::paginate();
        return view('admin.pinjam_toy.edit-pinjam_toy', [
            'item' => $pinjam_toy,
            'member' => $member,
            'user' => $user,
            'toy' => $toy
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pinjam_toy $pinjam_toy)
    {

        $data = $request->all();

        $pinjam_toy->update($data);

        return redirect()->route('pinjam_toys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pinjam_toy $pinjam_toy)
    {
        $pinjam_toy->status = 0;
        $pinjam_toy->save();

        return redirect()->route('pinjam_toys.index');
    }
}
