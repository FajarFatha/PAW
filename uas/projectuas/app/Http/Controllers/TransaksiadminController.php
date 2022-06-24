<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Muzakki;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dttransaksi=Transaksi::all();
        return view('transaksiadmin',compact('dttransaksi'),["title"=>"Data Transaksi"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        $id=DB::table('muzakkis')->latest('id_muzakki')->first();
        $id2=($id->id_muzakki)+1;
        Transaksi::create([
            'id_muzakki'=> $id2,
            'idbarang'=> $request->jenis,
            'tanggal'=> $request->tanggal,
            'jumlah_tanggungan'=>$request->tanggungan,
        ]);
        Muzakki::create([
            'nama_muzakki'=> $request->namamuzakki,
            'alamat'=> $request->alamat,
        ]);

        return redirect('/transaksiadmin')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        Transaksi::where("idtransaksi",$request->id)->update([
            "idbarang"=>$request->jenis,
            "tanggal"=>$request->tanggal,
            "jumlah_tanggungan"=>$request->tanggungan
        ]);

        Muzakki::where("id_muzakki",$request->idmuzakki)->update([
            "nama_muzakki"=>$request->namamuzakki,
            "alamat"=>$request->alamat
        ]);
        return redirect('/transaksiadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Transaksi::where("idtransaksi", $request->id)->delete();
        return redirect('/transaksiadmin');
    }
}
