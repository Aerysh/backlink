@extends('layouts.master')

@section('title', 'Invoice Pembayaran')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <div class="card">
                <div class="card-body">
                    @foreach ($payments as $payment)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4>Invoice Pembayaran</h4>
                                <small class="text-right">
                                    Tanggal: {{ date('d-m-Y', strtotime($payment->created_at)) }}
                                </small>
                            </div>
                        </div>
                        {{-- Invoice Info --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Dari
                                <address>
                                    <strong>{{ Auth::user()->name }}</strong>
                                </address>
                            </div>
                            <div class="col-md-4">
                                Kepada
                                <address>
                                    <strong>Penjual</strong>
                                </address>
                            </div>
                            <div class="col-md-4">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Deadline</th>
                                            <td>{{ date('d-m-Y', strtotime($payment->created_at . '+3 day')) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>@if ($payment->status == "waiting")
                                                Menunggu Pembayaran
                                            @else
                                                Telah Dibayar
                                            @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                        </div>
                        {{-- Invoice Info --}}


                        {{-- Tabel Produk --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>Website</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (json_decode($payment->order_details) as $details)
                                            <tr>
                                                <td>{{ $details->qty }}</td>
                                                <td>{{ $details->name }}</td>
                                                <td>Rp.
                                                    @if ($details->options->order_type == '2')
                                                        {{ $details->price - 75000}}
                                                    @else
                                                    {{ $details->price }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <p class="lead">Jumlah Yang Harus Dibayar</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                                    <tr>
                                                        <th class="w-50">Harga</th>
                                                        <td>
                                                            Rp. {{ $priceTotal }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-50">Penulisan Konten:</th>
                                                        <td>Rp. {{ $contentTotal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-50">Admin</th>
                                                        <td>Rp. {{ $adminTotal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-50">Total:</th>
                                                        <td>Rp. {{ $priceTotal + $adminTotal + $contentTotal }}</td>
                                                    </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if ($payment->payment_method == 'transfer')
                                <form action="{{ route('payment.update') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group mb-3">
                                        <input type="hidden" class="form-control" id="id" name="id" value={{ $payment->id }}>
                                    </div>
                                    @if ($payment->proof == '')
                                        <div class="form-group mb-3">
                                            <input type="file" class="form-control" id="payment_proof" name="payment_proof" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-file"></i> Upload Bukti</button>
                                            <small><a href="#" class="text-decoration-none">Informasi Channel Pembayaran</a></small>
                                        </div>
                                    @else
                                        <div class="form-group mb-3 text-center">
                                            <div>
                                                <label >Bukti Pembayaran</label>
                                            </div>
                                            <a href="{{ asset('payment_proof/'. $payment->proof ) }}" target="_blank" class="text-decoration-none">
                                                <img src="{{ asset('payment_proof/'. $payment->proof )}}" class="img-thumbnail" alt="bukti pembayaran" height="200" width="200" />
                                            </a>
                                        </div>
                                    @endif

                                </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
