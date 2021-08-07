@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Daftar Pembelian')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Buyer</b></li>
    <li class="breadcrumb-item active">Order</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
<li>
    <p class="lead">Saldo : Rp. 0</p>
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
    <hr>
    <li>
        <a href="{{route('payment.index')}}" class="nav-link text-white">
            Payment
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Order</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center w-100" id="orderList">
                            <thead>
                                <tr>
                                    <th>    Order   </th>
                                    <th>    Website </th>
                                    <th>    Harga   </th>
                                    <th>    Tanggal </th>
                                    <th>    Status  </th>
                                    <th>    Detail  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>    {{  $order->order_number    }}  </td>
                                        <td>
                                            @foreach ($order->website as $website)
                                                {{  $website->url   }}
                                            @endforeach
                                        </td>
                                        <td>    {{  $order->price   }}  </td>
                                        <td>    {{  date('d-M-y h:m:s', strtotime($order->created_at))  }}  </td>
                                        <td>    {{  $order->order_status    }}  </td>
                                        <td>    </td>
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

{{-- JS --}}
@section('js')
<script>
    $(document).ready( function () {
        $('#orderList').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
