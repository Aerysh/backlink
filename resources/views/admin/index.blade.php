@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Admin Dashboard')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <a href="{{ route('admin.admin_dashboard') }}" class="nav-link text-white active">
            Dashboard
        </a>
    </li>
    <hr>
    <li>
        <a href="{{ route('admin.admin_payment_dashboard') }}" class="nav-link text-white">
            Payment
        </a>
    </li>
    <li>
        <a href="{{ route('admin.admin_deposit_dashboard') }}" class="nav-link text-white">
            Deposit
        </a>
    </li>
    <li>
        <a href="" class="nav-link text-white">
            Withdraw
        </a>
    </li>
    <li>
        <a href="" class="nav-link text-white">
            Website
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    {{-- Stats --}}
    <div class="row mb-3">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Pending Payment</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">{{ $paymentCount }}</h1>
                    <h5 class="text-center text-muted">Total</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Pending Deposit</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">{{ $depositCount }}</h1>
                    <h5 class="text-center text-muted">Total</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Pending Withdraw</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">{{ $withdrawCount }}</h1>
                    <h5 class="text-center text-muted">Total</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Pending Website</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">{{ $websiteCount }}</h1>
                    <h5 class="text-center text-muted">Total</h5>
                </div>
            </div>
        </div>
    </div>
    {{-- Stats --}}

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead"></h5>
                </div>
                <div class="card-body">

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
