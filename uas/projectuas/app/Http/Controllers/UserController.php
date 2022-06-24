<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function datauser(Request $request){
        $dtuser=User::all();
        return view('datauser',compact("dtuser"),["title"=>"Data-User"]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        User::create([
            'name'=> $request->nama,
            'level'=> $request->level,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'remember_token'=>Str::random(60),
        ]);
        return redirect('/datauser')->with('success', 'Berhasil menambahkan user');
    }

    public function update(Request $request)
    {   
        $id=$request->id;
        $us=User::findorfail($id);
        $us->update($request->all());
        return redirect('/datauser')->with('success', 'Berhasil mengupdate user');
    }
    public function hapususer(Request $request)
    {
        $id=$request->id;
        // dd($id);
        $us=User::findorfail($id);
        $us->delete();
        return redirect('/datauser')->with('success', 'Berhasil menghapus user');
    }
    // public function hapususer()
    // {
    //     return view('transaksi',["title"=>"coba"]);
    // }
}
