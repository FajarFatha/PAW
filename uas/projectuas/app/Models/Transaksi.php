<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table="transaksis";
    protected $primarykey = "idtransaksi";
    protected $fillable = [
        'idtransaksi',
        'id_muzakki',
        'idbarang',
        'tanggal',
        'jumlah_tanggungan',
        'bukti',
    ];
    public function muzakki(){
        return $this->belongsTo(Muzakki::class,'id_muzakki','id_muzakki');
    }
    public function barang(){
        return $this->belongsTo(Barang::class,'idbarang','idbarang');
    }
}
