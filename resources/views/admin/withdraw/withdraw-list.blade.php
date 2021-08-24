@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Admin Dashboard')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Withdraw</li>
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
        <a href="{{ route('admin.admin_withdraw_dashboard') }}" class="nav-link text-white active">
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
                    <h5 class="card-title lead">Withdraw Request</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100" id="withdraws">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Metode </th>
                                    <th> Nama Penerima </th>
                                    <th> Nomor Penerima </th>
                                    <th> Jumlah Penarikan </th>
                                    <th> Status </th>
                                    <th> Tanggal </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdraws as $withdraw)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $withdraw->method }}</td>
                                        <td>{{ $withdraw->receiver_name }}</td>
                                        <td>{{ $withdraw->receiver_number }}</td>
                                        <td>{{ $withdraw->amount }}</td>
                                        <td>{{ $withdraw->status }}</td>
                                        <td>{{ date('d-m-Y h:i:s', strtotime($withdraw->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('admin.admin_withdraw_accept', ['id' => $withdraw->id]) }}" class="btn btn-outline-success">Selesai</a>
                                            <a href="{{ route('admin.admin_withdraw_decline', ['id' => $withdraw->id]) }}" class="btn btn-outline-danger">Tolak</a>
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
            $('#withdraws').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
