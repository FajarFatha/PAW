<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table="barangs";
    protected $primarykey = "idbarang";
    protected $fillable = [
        'idbarang',
        'namabarang',
        'besaranperjiwa',
        'stok',
        'satuan'
    ];
    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
