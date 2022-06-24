@extends('layouts.main')

@section('logout')
@include('partials.tombollogout')
@endsection

@section('main')
<style>
    .container{
        margin-top: 30px;
        background-color: white;
    }
    h1{
        margin-top: 10px;
        margin-bottom: 20px;
        text-align: center;
    }
    #pesan{
        text-align: center;
    }
    button{
        margin-top: 20px;
        margin-bottom: 30px;
    }
    nav{
        height: 70px;
    }
    
</style>
<div class="container">
    <h1>Bayar Zakat Online</h1>
    <p id="pesan">Hanya Menerima Zakat Uang, Nominal Rp.30.000 per Jiwa</p>
    <form action="{{ route("zakatonline") }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda">
        </div>
        <input type="hidden" class="form-control" id="Tanggal" name="tanggal" value="{{ date("Y-m-d") }}">
        <div class="form-group">
            <label for="tanggungan">Jumlah Tanggungan (termasuk anda)</label>
            <input type="number" class="form-control" id="tanggungan" name="tanggungan" onchange="myFunction()" placeholder="Masukkan jumlah tanggungan">
        </div>
        <div class="form-group">
            <label for="nominal">Jumlah yang harus dibayarkan (Rp.30.000 dikali Jumlah Tanggungan)</label>
            <p><b id="nominal"></b></p>
        </div>
        <div class="form-group">
            <select class="form-select" id="pilihan" aria-label="Pilih Metode Pembayaran" onchange="pembayaran()">
                <option selected>pilih Metode</option>
                <option value="dana">DANA</option>
                <option value="bri">Transfer BRI</option>
                <option value="btn">Transfer BTN</option>
                <option value="jatim">Transfer Bank Jatim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tujuan">Nomor Tujuan Pembayaran</label>
            <p><b id="tujuan"></b></p>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label">Masukkan Bukti Pembayaran</label>
            <input class="form-control" type="file" id="formFile" name="bukti" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </form>
</div>
<script>
function myFunction() {
  var x = document.getElementById("tanggungan").value;
  document.getElementById("nominal").innerHTML= "Rp."+x*30000;
}
function pembayaran() {
  var y = document.getElementById("pilihan").value;
  if(y=="dana"){
    document.getElementById("tujuan").innerHTML= "Nomor Tujuan Dana : 082337097804";
  }else if(y=="bri"){
    document.getElementById("tujuan").innerHTML= "Nomor Rekening Tujuan BRI : ";
  }else if(y=="btn"){
    document.getElementById("tujuan").innerHTML= "Nomor Rekening Tujuan BTN : ";
  }else if(y=="jatim"){
    document.getElementById("tujuan").innerHTML= "Nomor Rekening Tujuan Bank Jatim : ";
  }
}
</script>
@endsection