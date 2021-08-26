@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Admin Dashboard')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">Website</li>
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
        <a href="{{ route('admin.admin_withdraw_dashboard') }}" class="nav-link text-white">
            Withdraw
        </a>
    </li>
    <li>
        <a href="{{ route('admin.admin_website_dashboard') }}" class="nav-link text-white active">
            Website
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert alert-info" role="alert">
                    <p class="text-center">{{  Session::get('message') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Website List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100 text-center" id="websites">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Website </th>
                                    <th> Deskripsi </th>
                                    <th> DA </th>
                                    <th> PA </th>
                                    <th> Harga </th>
                                    <th> Waktu Pengiriman </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($websites as $website)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $website->url }}</td>
                                        <td>{{ $website->description }}</td>
                                        <td>{{ $website->domain_authority }}</td>
                                        <td>{{ $website->page_authority }}</td>
                                        <td>{{ $website->price }}</td>
                                        <td>{{ $website->delivery_time }} Hari</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-primary">Detail</a>
                                            <a href="{{ route('admin.admin_website_accept', ['id' => $website->id]) }}" class="btn btn-outline-success">Terima</a>
                                            <a href="{{ route('admin.admin_website_decline', ['id' => $website->id]) }}" class="btn btn-outline-danger">Tolak</a>
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
        $('#websites').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
