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
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="lead card-title">Detail Deposit</h5>
                </div>
                <div class="card-body">
                    @foreach ($deposits as $deposit)
                        <form>
                            <div class="form-group mb-3">
                                <label for="amount">Jumlah Deposit</label>
                                <input type="text" class="form-control" id="amount" name="amount" value="Rp. {{ $deposit->amount }}" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status">Status Pembayaran</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $deposit->status }}" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Tanggal</label>
                                <input type="datetime" class="form-control" id="date" name="date" value="{{ date('d-m-Y h:i:s', strtotime($deposit->created_at)) }}" disabled>
                            </div>
                            <div class="form-group mb-3">
                            @if ($deposit->proof == '')
                                <div class="form-group mb-3">
                                    <label for="proof_upload">Upload Bukti Pembayaran</label>
                                    <input class="form-control" type="file" id="proof_upload" name="proof_upload">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Upload Bukti</button>
                                </div>
                            @else
                                <div class="form-group mb-3">
                                    <label for="proof">Bukti Pembayaran</label>
                                    <div class="text-center">
                                    <img class="img-thumbnail" src="https://picsum.photos/500" alt="Bukti pembayaran" height="200" width="200">
                                    </div>
                                </div>
                            @endif
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2">
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
