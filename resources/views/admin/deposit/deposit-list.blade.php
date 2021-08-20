@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Pending Deposit List')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Deposit</li>
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
        <a href="{{ route('admin.admin_deposit_dashboard') }}" class="nav-link text-white active">
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
                    <h5 class="card-title lead">Pending Deposit</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100 text-center" id="deposits">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th></th>
                            </thead>
                            <tbody>
                                @foreach ($deposits as $deposit)
                                    <tr>
                                        <td>
                                            {{ $loop->index +1 }}
                                        </td>
                                        <td>
                                            {{ $deposit->name }}
                                        </td>
                                        <td>
                                            Rp. {{ $deposit->amount }}
                                        </td>
                                        <td>
                                            {{ $deposit->proof }}
                                        </td>
                                        <td>
                                            {{ $deposit->status }}
                                        </td>
                                        <td>
                                            {{ date('d-m-Y h:i:s', strtotime($deposit->created_at)) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.admin_deposit_accept', ['id' => $deposit->id]) }}" class="btn btn-outline-success">Terima</a>
                                            <a href="#" class="btn btn-outline-danger">Tolak</a>
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
            $('#deposits').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
