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
    <h1>Terimakasih sudah membayar zakat, semoga diterima oleh Allah SWT.</h1>
</div>
@endsection