<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function indexAdmin()
    {
        if(Auth::check()){
            return redirect('cms/admin-dashboard');
        }

        return view('auth.login');
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
        if(Auth::check()){
            return view('admin.dashboard');
        }
  
        return redirect("cms")->withSuccess('You are not allowed to access');
    }
    
    public function getUser()
    {
        if(Auth::check()){
            $user = User::paginate();

            return view('admin.users', [
                'user' => $user
            ]);
        }

        return redirect('cms');
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function signOutAdmin() {
        Session::flush();
        Auth::logout();
  
        return Redirect('cms');
    }
}
