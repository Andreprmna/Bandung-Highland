<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\Role;
use Error;
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
        if (Auth::guard('admin')->check()) {
            $admin = Admin::with('role')->paginate();

            return view('admin.users', [
                'user' => $admin
            ]);
        }

        return redirect('cms');
    }

    public function indexAdmin()
    {
        if (Auth::guard('admin')->check()) {
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
        $role = Role::paginate();

        if (Auth::guard('admin')->check()) {
            return view('admin.create-user', [
                'role' => $role,
            ]);
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

        if ($request->file('foto_profil') != null) {
            $data['foto_profil'] = $request->file('foto_profil')->store('assets/admin', 'public');
        }

        Admin::create($data);
        // $check = $this->createUser($data);

        return redirect()->route("admins.index")->withSuccess('You have signed-in');
    }


    public function createUser(array $data)
    {
        return Admin::create([
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
        );

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('cms/admin-dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("cms")->withSuccess('Login details are not valid');
    }

    public function dashboardAdmin()
    {
        if (Auth::guard('admin')->check()) {
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
    public function edit(Admin $admin)
    {
        $role = Role::paginate();

        return view('admin.edit-user', [
            'item' => $admin,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $data = $request->all();

        if ($request->file('foto_profil')) {
            $data['foto_profil'] = $request->file('foto_profil')->store('assets/admin', 'public');
        }

        $admin->update($data);

        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index');
    }

    public function signOutAdmin()
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return Redirect('cms');
    }
}
