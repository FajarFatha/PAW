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
    <h2 style="color:white; text-align:center">Login</h2>
    </div>
    <div class="container">
    <form action="{{ route('postlogin') }}" method="POST">
      {{ csrf_field() }}
      <div class="mb-3">
        <label for="inputemail" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputemail" name="email">
      </div>
      <div class="mb-3">
        <label for="inputpassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputpassword" name="password">
      </div>
      <div style="text-align: center;">
          <button type="submit" class="btn btn-primary" value="LOGIN">login</button>
      </div>
      <div style="text-align: center; margin-top:20px">
          <p>Belum Punya Akun? <a href="/register">Daftar</a></p>
      </div>
    </form>
</div>
    
@endsection