<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZakatController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $nm=$request->bukti;
        $namafile=time().rand(100,999).".".$nm->getClientOriginalExtension();
        $id=DB::table('muzakkis')->latest('id_muzakki')->first();
        $id2=($id->id_muzakki)+1;
        //dd($id2);   
        Transaksi::create([
            'id_muzakki'=> $id2,
            'idbarang'=> "2",
            'tanggal'=> $request->tanggal,
            'jumlah_tanggungan'=>$request->tanggungan,
            'bukti'=>$namafile,
        ]);
        $nm->move(public_path().'/img',$namafile);
        Muzakki::create([
            'nama_muzakki'=> $request->nama,
            'alamat'=> $request->alamat,
        ]);

        return redirect('/afterzakat');
    }
}
