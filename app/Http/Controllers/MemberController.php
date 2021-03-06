<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::paginate();

        return view('admin.member.members', [
            'member' => $member
        ]);
        return redirect()->route('cms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create-member');

        return redirect()->route('cms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        if ($request->file('foto_profil') != null) {
            $data['foto_profil'] = $request->file('foto_profil')->store('assets/member', 'public');
        }

        Member::create($data);

        // $check = $this->createUser($data);

        return redirect()->route("members.index")->withSuccess('You have signed-in');
    }


    public function createUser(array $data)
    {
        return Member::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nama' => $data['nama'],
            'tgl_lahir' => $data['tgl_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat'],
            'foto_profil' => $data['foto_profil'],

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
    public function edit(Member $member)
    {
        return view('admin.member.edit-member', [
            'item' => $member
        ]);

        return redirect()->route('cms');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $data = $request->all();

        if ($request->file('foto_profil') != null) {
            $data['foto_profil'] = $request->file('foto_profil')->store('assets/member', 'public');
        }

        $member->update($data);

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->status = 0;
        $member->save();

        return redirect()->route('members.index');
    }
}
