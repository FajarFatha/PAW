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

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtbarang=Barang::all();
        return view('inventory',compact('dtbarang'),["title"=>"Data Inventory"]);
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
        Barang::create([
            'namabarang'=> $request->nama,
            'besaranperjiwa'=> $request->besaran,
            'stok'=> $request->stok,
            'satuan'=>$request->satuan,
        ]);

        return redirect('/inventory');
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
        Barang::where("idbarang",$request->id)->update([
            'namabarang'=> $request->nama,
            'besaranperjiwa'=> $request->besaran,
            'stok'=> $request->stok,
            'satuan'=>$request->satuan,
        ]);

        return redirect('/inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Barang::where("idbarang", $request->id)->delete();
        return redirect('/inventory');
    }
}

