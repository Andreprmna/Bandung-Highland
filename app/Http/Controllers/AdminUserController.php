<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = User::paginate();

            return view('admin.users', [
                'user' => $user
            ]);
        }

        return redirect('cms');
    }

    public function indexAdmin()
    {
        if (Auth::check()) {
            return redirect('cms/admin-dashboard');
        }

        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('admin.create-user');
        }
        return redirect('cms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['foto_profil'] = $request->file('foto_profil')->store('assets/user', 'public');

        $check = $this->createUser($data);

        return redirect()->route("users.index")->withSuccess('You have signed-in');
    }


    public function createUser(array $data)
    {
        return User::create([
            'id_role' => $data['id_role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nama' => $data['nama'],
            'tgl_lahir' => $data['tgl_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat']
        ]);
    }

    public function customAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role' => 0,
        );

        $credentials2 = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role' => 1,
        );

        if (Auth::attempt($credentials)) {
            return redirect()->intended('cms/admin-dashboard')
                ->withSuccess('Signed in');
        } elseif (Auth::attempt($credentials2)) {
            return redirect()->intended('cms/admin-dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("cms")->withSuccess('Login details are not valid');
    }

    public function dashboardAdmin()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return redirect("cms")->withSuccess('You are not allowed to access');
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
    public function edit(User $user)
    {
        return view('admin.edit-user', [
            'item' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        if ($request->file('profile_photo_path')) {
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('assets/user', 'public');
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    public function signOutAdmin()
    {
        Session::flush();
        Auth::logout();

        return Redirect('cms');
    }
}
