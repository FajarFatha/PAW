@extends('layouts.main')

@section('main')
<style>
    .container{
    width: 30%;
    background-color: white;
	padding: 20px;
}
</style>
<div class="container" style="background-color: #435d7d; margin-top: 70px;">
    <h2 style="color:white; text-align:center">Register</h2>
    </div>
    <div class="container">
    <form action="{{ route('simpanregister') }}" method="POST">
      {{ csrf_field() }}
    <div class="mb-3">
        <label for="inputnama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="inpunama" name="nama">
      </div>
      <div class="mb-3">
        <label for="inputusername" class="form-label">email</label>
        <input type="email" class="form-control" id="inputusername" name="email">
      </div>
      <div class="mb-3">
        <label for="inputpassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputpassword" name="password">
      </div>
      <div style="text-align: center;">
          <button type="submit" class="btn btn-primary" value="DAFTAR" name="daftar">Daftar</button>
      </div>
      <div style="text-align: center; margin-top:20px">
          <p>Sudah Punya Akun? <a href="/login">Login</a></p>
      </div>
    </form>
</div>
@endsection