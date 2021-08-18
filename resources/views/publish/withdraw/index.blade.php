@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Penarikan')

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
        <a href="{{route('publish.user_dashboard')}}" class="nav-link text-white">
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
        <a href="" class="nav-link text-white active">
            Penarikan
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="col-md-12">
                @if (Session::has('message'))
                    <div class="alert alert-info text-center" role="alert">
                        {{  Session::get('message') }}
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Penarikan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('publisher.user_withdraw_store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="method">Metode Penarikan</label>
                                    <select class="form-select" id="method" name="method" required>
                                        <option value="" selected hidden disabled>Pilih Metode</option>
                                        <option value="BRI">BRI</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BTN">BTN</option>
                                        <option value="BSI">BSI</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="receiver_number">Nomor Penerima</label>
                                    <input type="number" class="form-control" id="receiver_number" name="receiver_number" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="amount">Jumlah Penarikan</label>
                                    <input type="number" class="form-control" id="amount" name="amount" required>
                                </div>
                                <div class="form-group mb-3 text-end">
                                    <button type="submit" class="btn btn-primary">Withdraw</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table w-100">
                                    <tr>
                                        <td class="w-50">Jumlah</td>
                                        <td id="subtotal"></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"><abbr title="5% dari jumlah penarikan">Admin</abbr></td>
                                        <td id="admin"></td>
                                    </tr>
                                    <tr>
                                        <th class="w-50">Total</th>
                                        <td id="total"></td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">History Penarikan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100 text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Metode</th>
                                    <th>Nomor Penerima</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdraws as $withdraw)
                                    <tr>
                                        <td>
                                            {{ $loop->index+1 }}
                                        </td>
                                        <td>
                                            {{ $withdraw->method }}
                                        </td>
                                        <td>
                                            {{ $withdraw->receiver_number }}
                                        </td>
                                        <td>
                                            {{ $withdraw->amount }}
                                        </td>
                                        <td>
                                            {{ $withdraw->status }}
                                        </td>
                                        <td>
                                            {{ date('d-m-Y h:i:s', strtotime($withdraw->created_at)) }}
                                        </td>
                                        <td>
                                            <form action="" method="GET">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Batal</button>
                                            </form>
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

@endsection
