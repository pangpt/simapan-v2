<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){

        return view('login.index');
    }

    // public function login(Request $request)
    // {
    //     // dd($request->all());
    //     $this->validate($request, [
    //         'username' => 'required|username',
    //         'password' => 'required|min:5',
    //     ]);
    //     $data = User::where('username', $request->username)->first();

    //     if($data){
    //         if(Hash::check($request->password, $data->password))
    //         {
    //             session([
    //                 'berhasil_login' => true,
    //             ]);
    //             return redirect('/dashboard');
    //         }
    //     }
    //     return redirect('/loginpage')->with('error', 'Username atau Password salah!');
    // }

    public function login(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:5',
        ]);

        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt([ 'username' => $username,'password' => $password ])) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah!');
        }

    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        session()->flush();

        return redirect()->route('simapan.index');
    }

}
