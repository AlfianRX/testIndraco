@extends('layouts.app')

@section('content')
@if(Auth::check())
    @if(Auth::user()->role == 'admin')
        <!-- Tampilan untuk admin -->
        <h1>Selamat datang, Admin!</h1>
        <!-- Tambahkan kode HTML untuk tampilan admin di sini -->
    @else
        <!-- Tampilan untuk pengguna -->
        <h1>Selamat datang, Pengguna!</h1>
        <!-- Tambahkan kode HTML untuk tampilan pengguna di sini -->
    @endif
@else
    <!-- Tampilan untuk pengunjung (belum login) -->
    <h1>Selamat datang, Pengunjung!</h1>
    <!-- Tambahkan kode HTML untuk tampilan pengunjung di sini -->
@endif





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>
                Our Products
                </h1>
            </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100">
                            <img src="{{asset('images/kopi1.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

@endsection
