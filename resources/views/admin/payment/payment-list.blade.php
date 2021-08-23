@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Pending Payment List')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Payment</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <a href="{{ route('admin.admin_dashboard') }}" class="nav-link text-white">
            Dashboard
        </a>
    </li>
    <hr>
    <li>
        <a href="{{ route('admin.admin_payment_dashboard') }}" class="nav-link text-white active">
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
    <div class="row mb-3">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert alert-info" role="alert">
                    <p class="text-center">{{  Session::get('message') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Pending Payment</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100 text-center" id="payments">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Website</th>
                                    <th>Harga</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Bukti</th>
                                    <th>Tanggal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)

                                    <tr>
                                        <td>
                                            {{ $loop->index+1 }}
                                        </td>

                                            <td>
                                                @foreach (json_decode($payment->order_details) as $detail)
                                                {{ $detail->name }} <br/>
                                                @endforeach
                                            </td>
                                            <td>

                                                @php
                                                    $total = 0;
                                                @endphp

                                                @foreach( json_decode($payment->order_details) as $details)
                                                    @php
                                                        $total += $details->price;
                                                        $total += $details->tax;
                                                    @endphp
                                                @endforeach

                                                Rp. {{ (int)$total }}
                                            </td>

                                        <td>
                                            {{ $payment->payment_method }}
                                        </td>
                                        <td>
                                            @if ( $payment->proof == '')
                                                Belum Upload Bukti
                                            @else
                                                <a href="{{ asset('payment_proof/'.$payment->proof)}}" class="text-decoration-none" target="_blank">Lihat</a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('d-m-Y h:i:s', strtotime($payment->created_at)) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.admin_payment_accept', ['id' => $payment->id]) }}" class="btn btn-outline-success">Terima</a>
                                            <a href="{{ route('admin.admin_payment_decline', ['id' => $payment->id]) }}" class="btn btn-outline-danger">Tolak</a>
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

{{-- JS --}}
@section('js')
    <script>
        $(document).ready( function () {
            $('#payments').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
