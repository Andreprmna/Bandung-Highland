<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Client Side

    public function index()
    {
        if (Auth::guard('web')->check()) {
            return redirect('/');
        }

        return view('page-login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('page-register');
    }


    public function customRegistration(UserRequest $request)
    {
        $data = $request->all();

        $data['profile_photo_path'] = $request->file('profile_photo_path')->store('assets/user', 'public');

        // User::create($data);

        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tgl_lahir' => $data['tgl_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat' => $data['alamat'],
            'profile_photo_path' => $data['profile_photo_path']
        ]);
    }


    public function dashboard()
    {
        if (Auth::guard('web')->check()) {
            return view('index');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut()
    {
        // Session::flush();
        Auth::guard('web')->logout();

        return redirect()->back();
    }
    public function getuser()
    {
        return $this->tampil();
    }
    public function tampil()
    {
        $data = User::all();
        return $data;
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
        $user->status = 0;
        $user->save();

        return redirect()->route('users.index');
    }
}
