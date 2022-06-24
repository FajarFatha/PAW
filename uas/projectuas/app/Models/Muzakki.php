<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    use HasFactory;
    protected $table="muzakkis";
    protected $primarykey = "id_uzakki";
    protected $fillable = [
        'id_muzakki',
        'nama_muzakki',
        'alamat',
    ];
    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
