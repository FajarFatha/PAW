<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanlogin(){

        if(isset(auth()->user()->level)){
            if(auth()->user()->level=='panitia'){
                return redirect('/transaksi');
            }elseif(auth()->user()->level=='admin'){
                return view('admin',["title"=>"admin"]);
            }elseif(auth()->user()->level=='public'){
                return redirect('/zakatonline');
            }
        }else{
            return view('login',["title" => "login"]);
        }
    }

    // public function index(){
    //     $dtuser=User::all();
    //     return view('datauser',compact('dtuser'),["title"=>"data"]);
    // }
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            if(auth()->user()->level=='panitia'){
                return redirect('/transaksi');
            }elseif(auth()->user()->level=='admin'){
                return view('admin',["title"=>"admin"]);
            }elseif(auth()->user()->level=='public'){
                return redirect('/zakatonline');
            }
        }
        return redirect('/login');
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function halamanregister(){
        return view('register',["title" => "register"]);
    }
    public function simpanregister(Request $request){
        // dd($request->all());
        User::create([
            'name'=>$request->nama,
            'level'=> '?',
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'remember_token'=>Str::random(60),
        ]);
        return redirect('/login')->with('success', 'Berhasil mendaftar, silahkan tunggu konfirmasi admin');
    }

}
