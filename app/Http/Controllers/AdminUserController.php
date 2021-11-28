<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\Booking_audio;
use App\Models\Booking_buku;
use App\Models\Booking_coworking_space;
use App\Models\Booking_toy;
use App\Models\Booking_video;
use App\Models\Member;
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
        $admin = Admin::with('role')->paginate()->except(Auth::guard('admin')->user()->id_admin);

        return view('admin.users', [
            'user' => $admin
        ]);
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

        return view('admin.create-user', [
            'role' => $role,
        ]);
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

        $data['password'] = Hash::make($request->password);

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
        $member = Member::count();
        $audio = Booking_audio::count();
        $buku = Booking_buku::count();
        $cospace = Booking_coworking_space::count();
        $toy = Booking_toy::count();
        $video = Booking_video::count();

        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard', [
                'member' => $member,
                'audio' => $audio,
                'buku' => $buku,
                'cospace' => $cospace,
                'toy' => $toy,
                'video' => $video,
            ]);
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

    public function editProfile()
    {
        $role = Role::paginate();

        return view('admin.profile-page', [
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

        if ($admin->id_admin == Auth::guard('admin')->user()->id_admin) {
            return redirect()->route('admin.profile');
        }

        return redirect()->route('admins.index');
    }

    public function changePassword(Request $request) {
        $user = Auth::guard('admin')->user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success','password successfully updated');
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
        // Session::flush();
        Auth::guard('admin')->logout();

        return Redirect('cms');
    }
}
