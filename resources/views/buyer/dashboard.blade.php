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
        <a href="{{route('buyer.user_order_list')}}" class="nav-link text-white">
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
                    <h1 class="text-muted">{{   $orderCount    }}</h1>
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
                    <h1 class="text-muted">{{   $finishedOrder  }}</h1>
                    <h5>Order</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title lead">Order Aktif</h5>
                    </div>
                </div>
                <div class="card-body text-center">
                    <h1 class="text-muted">{{   $activeOrder    }}</h1>
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
                    <div class="table-responsive mb-3">
                        <table class="table table-hover w-100 text-center" id="orderList">
                            <thead>
                                <tr>
                                    <th>Website</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        @foreach ($order->website as $website)
                                            <td>    {{  $website->url   }}  </td>
                                        @endforeach
                                        <td>{{  $order->price   }}</td>
                                        <td>{{  date('d-M-y h:m:s', strtotime($order->created_at))  }}  </td>
                                        <td>{{  $order->order_status    }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                        <td><a href="{{route('buyer.user_order_list')}}" class="btn btn-outline-primary">Lihat Semua</a></td>
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
<script>
    $(document).ready( function () {
        $('#orderList').DataTable({
            responsive: true,
            searching: false,
        });
    });
</script>
@endsection
