<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomLoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if ($result) {
            return back()->with('Success', 'You Register Successfully');
        } else {
            return back()->with('fail', 'Something Wrong');
        }
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $user = user::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);

                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not matched');
            }
        } else {
            return back()->with('fail', 'This email is not registered');
        }
    }
    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = user::where('id', '=', Session::get('loginId'))->first();
        }
        return view('auth.dashboard', compact('data'));
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
