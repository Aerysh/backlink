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
        <a href="{{route('buyer.user_order_list')}}" class="nav-link text-white">
            Order
        </a>
    </li>
    <hr>
    <li>
        <a href="{{route('payment.index')}}" class="nav-link text-white active">
            Payment
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
<div class="row">
    <div class="col-md-12">
        @if (Session::has('message'))
            <div class="alert alert-info" role="alert">
                {{  Session::get('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5 class="card-title lead">Pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-hover w-100" id="paymentList">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Website</th>
                                <th>Total</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Bukti</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>    {{  $loop->index+1    }}  </td>
                                    <td>
                                    @foreach (json_decode($payment->order_details) as $detail)
                                        {{  $detail->name    }} <br />
                                    @endforeach
                                    </td>
                                    <td>    Rp. {{  $detail->price  }}  </td>
                                    <td>    {{  $payment->payment_method    }}  </td>
                                    <td>    {{  $payment->status    }}  </td>
                                    <td>    {{  $payment->proof }}  </td>
                                    <td>    {{  date('d-M-y', strtotime($payment->created_at))}}    </td>
                                    <td>    <a class="btn btn-primary">Lihat</a> </td>
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
        $('#paymentList').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
