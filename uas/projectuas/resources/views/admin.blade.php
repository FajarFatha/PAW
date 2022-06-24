@extends('layouts.main')
@section('logout')
@include('partials.tombollogout')
@endsection
@section('main')
<link rel="stylesheet" href="/css1/style2.css">
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    @include('partials.sidebar')
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Page content-->
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <h1>Selamat datang admin {{ auth()->user()->name }}</h1>
                    <h3>Semoga Harimu Menyenangkan</h3>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection