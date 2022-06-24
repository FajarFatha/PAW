<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('idtransaksi')->unique();
            $table->string('id_muzakki',5);
            $table->date('tanggal');
            $table->integer('jumlah_tanggungan');
            $table->string('bukti',300);
            $table->timestamps();
        });
    }

    // Schema::table('transaksis',function(Blueprint $table){
    //     $table->foreign('id_muzakki')->references('id_muzakki')->on('muzakkis')
    // })

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
