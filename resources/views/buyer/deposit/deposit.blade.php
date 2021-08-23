@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Buyer Dashboard')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Buyer</b></li>
    <li class="breadcrumb-item active">Deposit</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <p class="lead">Saldo : Rp. {{  Auth::user()->balance }}</p>
    </li>
    <hr>
    <li>
        <a href="{{route('buyer.user_deposit_index')}}" class="nav-link text-white active">
            + Deposit
        </a>
    </li>
    <hr>
    <li>
        <a href="{{route('buyer.user_dashboard')}}" class="nav-link text-white">
            Dashboard
        </a>
    </li>
    <li>
        <a href="{{route('buyer.user_order_list')}}" class="nav-link text-white">
            Order
        </a>
    </li>
    <hr>
    <li>
        <a href="{{route('payment.index')}}" class="nav-link text-white">
            Payment
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Deposit</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('buyer.user_deposit_store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="amount">Jumlah</label>
                                    <input type="number" class="form-control" id="amount" name="amount" onkeyup="change()" placeholder="Masukan Jumlah Deposit">
                                    <input type="hidden" class="form-control" id="sub" name="sub">
                                </div>
                                <div class="form-goup mb-3 text-end">
                                    <button type="submit" class="btn btn-primary">Deposit</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5></h5>
                                <div class="table-responsive">
                                    <table class="table w-100">
                                        <tr>
                                            <th class="w-50">Jumlah</th>
                                            <td id="subtotal">Rp. 0</td>
                                        </tr>
                                        <tr>
                                            <th class="w-50">Admin</th>
                                            <td id="admin">Rp. 0</td>
                                        </tr>
                                        <tr>
                                            <th class="w-50">Total</th>
                                            <th id="total">Rp. 0</th>
                                    </table>
                                    <small>Biaya admin 5% dari jumlah deposit</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="lead card-title">History Deposit</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100 text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Bukti</th>
                                    <th>Tanggal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposits as $deposit)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>Rp. {{ $deposit->amount }}</td>
                                        <td>{{ $deposit->status }}</td>
                                        <td>{{ $deposit->proof }}</td>
                                        <td>{{ date('d-m-Y h:i:s', strtotime($deposit->created_at)) }}</td>
                                        <td>
                                            <a href="{{route('buyer.user_deposit_show', ['id' => $deposit->id])}}" class="btn btn-primary">Lihat</a>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
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
<script src="{{asset('assets/js/admin/admin.js')}}"></script>

@endsection
