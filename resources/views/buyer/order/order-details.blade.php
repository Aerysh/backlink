@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Detail Pembelian')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Buyer</b></li>
    <li class="breadcrumb-item active">Order</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <p class="lead">Saldo : Rp. {{  Auth::user()->balance   }}</p>
    </li>
    <hr>
    <li>
        <a href="{{route('buyer.user_deposit_index')}}" class="nav-link text-white">
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
        <a href="{{route('buyer.user_order_list')}}" class="nav-link text-white active">
            Order
        </a>
    </li>
    <hr />
    <li>
        <a href="{{route('payment.index')}}" class="nav-link text-white">
            Payment
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md">
        </div>
        @foreach ($orders as $order)
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="w-100">
                                    <tr>
                                        <td class="w-50">
                                            <strong>Nomor</strong>
                                        </td>
                                        <td>{{  $order->order_number    }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">
                                            <strong>Website</strong>
                                        </td>
                                        <td>
                                            @foreach ($order->website as $website)
                                                {{  $website->url   }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">
                                            <strong>Harga</strong>
                                        </td>
                                        <td>Rp. {{  $order->price }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <table class="w-100">
                                <tr>
                                    <td class="w-50">
                                        <strong>Status</strong>
                                    </td>
                                    <td >{{  $order->order_status }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="lead">Detail</h5>
                            <div class="form-group mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea id="keterangan" class="form-control" disabled>{{  $order->details }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <a href="{{ $order->result  }}" class="btn btn-primary" target="_blank">Lihat Hasil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-md">
        </div>
    </div>
@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- JS --}}
@section('js')
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('keterangan');
    </script>
@endsection

