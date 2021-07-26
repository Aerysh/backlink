@extends('layouts.master')

@section('title', 'Order Details')

@section('content')
    <div class="section py-5">
        <div class="section container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h4>Order Details</h4>
                                    <small class="text-right">
                                        Tanggal: 26/07/2021
                                    </small>
                                </div>
                            </div>
                            {{-- Invoice Info --}}
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    Dari
                                    <address>
                                        <strong>User #1</strong>
                                    </address>
                                </div>
                                <div class="col-md-4">
                                    Kepada
                                    <address>
                                        <strong>Penjual</strong>
                                    </address>
                                </div>
                                <div class="col-md-4">
                                    <strong>Order #1</strong>

                                    <br>
                                    <br>
                                    <strong>Deadline Pembayaran:</strong> 31/07/2021
                                    <br>
                                    <strong>Status:</strong> Menunggu Pembayaran
                                </div>
                            </div>
                            {{-- Invoice Info --}}

                            {{-- Tabel Produk --}}
                            <div class="row mb-3">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center w-100" id="tabel_produk">
                                        <thead>
                                            <tr>
                                                <th>Jml</th>
                                                <th>Website</th>
                                                <th>Nomor Order</th>
                                                <th>Deskripsi</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>https://aerysh.xyz</td>
                                                <td>4GYVYTP0KF</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                                <td>Rp. 50000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Tabel Total --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <p class="lead">Jumlah Yang Harus Dibayar</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="w-50">Subtotal:</th>
                                                    <td>Rp. 50000</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-50">Penulisan Konten:</th>
                                                    <td>Rp. 0</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-50">Lainnya</th>
                                                    <td>Rp. 0</td>
                                                </tr>
                                                <tr>
                                                    <th class="w-50">Total:</th>
                                                    <td>Rp. 50000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Tabel Total --}}

                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="#" class="btn btn-success"><i class="fa fa-file-image"></i> Upload Bukti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
