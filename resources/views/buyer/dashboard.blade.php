@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Dasbor Pembeli')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Buyer</b></li>
    <li class="breadcrumb-item active">Dasbor</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <p class="lead">Saldo : Rp. 0</p>
    </li>
    <hr>
    <li>
        <a href="{{route('buyer.user_dashboard')}}" class="nav-link text-white active">
            Dashboard
        </a>
    </li>
    <li>
        <a href="{{route('buyer.user_order')}}" class="nav-link text-white">
            Order
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    {{-- Row Statistik --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Jumlah Pembelian</h5>
                </div>
                <div class="card-body text-center">
                    <h1 class="text-muted">1</h1>
                    <h5>Pembelian</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Order Selesai</h5>
                </div>
                <div class="card-body text-center">
                    <h1 class="text-muted">1</h1>
                    <h5>Order</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">Order Aktif</h5>
                    </div>
                </div>
                <div class="card-body text-center">
                    <h1 class="text-muted">0</h1>
                    <h5>Order</h5>
                </div>
            </div>
        </div>
    </div>
    {{-- Row Order --}}
    <div class="row py-3">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title lead">Order</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Website</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>facebook.com</td>
                                    <td>Rp. 100000</td>
                                    <td>13 Jul 2021</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                        <td><a href="{{route('buyer.user_order')}}" class="btn btn-outline-primary">Lihat Semua</a></td>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- JS --}}
@section('js')

@endsection
