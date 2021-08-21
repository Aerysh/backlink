@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Dasbor Penerbit')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Penerbit</b></li>
    <li class="breadcrumb-item active">Dasbor</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <p class="lead">Saldo : Rp. {{  Auth::user()->balance   }}</p>
    </li>
    <hr>
    <li>
        <a href="{{route('publish.user_dashboard')}}" class="nav-link text-white active">
            Dasbor
        </a>
    </li>
    <li>
        <a href="{{route('publish.user_website_list')}}" class="nav-link text-white">
            Website
        </a>
    </li>
    <hr>
    <li>
        <a href="{{route('publish.user_order_list')}}" class="nav-link text-white">
            Order
        </a>
    </li>
    <li>
        <a href="{{route('publisher.user_withdraw_index')}}" class="nav-link text-white">
            Penarikan
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Total Penghasilan</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">Rp. {{   $income }}</h1>
                    <h5 class="text-center text-muted">Total</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Order Aktif</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">{{   $orderCount }}</h1>
                    <h5 class="text-center text-muted">Order</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Jumlah Website</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">{{   $websiteCount   }}</h1>
                    <h5 class="text-center text-muted">Website</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Order Masuk</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center w-100" id="orderList">
                            <thead>
                                <tr>
                                    <th>    #   </th>
                                    <th>    Order   </th>
                                    <th>    Website </th>
                                    <th>    Harga   </th>
                                    <th>    Tanggal </th>
                                    <th>    Status  </th>
                                    <th>    Edit  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($websites as $website)
                                    <tr>
                                        <td>    {{  $loop->index+1  }}  </td>
                                        <td>
                                            @foreach ($website->order as $order)
                                                {{  $order->order_number    }}
                                            @endforeach
                                        </td>
                                        <td>    {{  $website->url   }}  </td>
                                        <td>    {{  $order->price }}    </td>
                                        <td>    {{  date('d-M-Y h:m:s', strtotime($order->created_at))  }}    </td>
                                        {{-- <td>    {!! $order->order_status    !!}  </td> --}}
                                        <td>
                                            <div class="badge bg-info">{{  $order->order_status    }}</div>
                                        </td>
                                        <td>
                                            @if ($order->order_status == "Menunggu Pembayaran" || $order->order_status == "Selesai")
                                                <a href="#" class="btn btn-outline-primary disabled" >Kerjakan</a>
                                            @else
                                                <a href="#" class="btn btn-outline-primary">Kerjakan</a>
                                            @endif
                                        </td>
                                    </tr>
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

{{-- Javascript --}}
@section('js')
    <script>
        $(document).ready( function () {
            $('#orderList').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
