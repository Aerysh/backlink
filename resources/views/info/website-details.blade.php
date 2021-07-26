@extends('layouts.master')

@section('title', 'Website Details')

@section('content')
    <div class="section py-5">
        <div class="section container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-body">
                            {{-- Website Info --}}
                            <div class="row mb-3">
                                <div class="col-md-1 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-globe-asia fa-3x"></i>
                                </div>
                                <div class="col-md-8">
                                    <p class="lead">aerysh.xyz</p>
                                    <a href="#" target="_blank" class="text-muted"><small>aerysh.xyz</small></a>
                                </div>
                                <div class="col-md-3 text-end">
                                    <p class="h4">Rp. 50000</p>
                                    <small>Per Postingan</small>
                                </div>
                            </div>
                            {{-- Website Info --}}

                            {{-- Website Domain & Page Authority --}}
                            <div class="row mb-3">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body bg-light text-center">
                                            <h2 class="text-primary">10</h2>
                                            <small class="text-muted">Domain Authority</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body bg-light text-center">
                                            <h2 class="text-primary">10</h2>
                                            <small class="text-muted">Page Authority</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            {{-- Website Domain & Page Authority --}}

                            {{-- Website Details --}}
                            <div class="row mb-3">
                                <div class="table-responsive">
                                    <table class="table table-sriped w-100">
                                        <tr>
                                            <th class="w-50">Kategori</th>
                                            <td>Teknologi</td>
                                        </tr>
                                        <tr>
                                            <th class="w-50">Waktu Pengiriman</th>
                                            <td>3 Hari</td>
                                        </tr>
                                        <tr>
                                            <th class="w-50">Contoh Pembelian</th>
                                            <td><a href="#" class="text-dark">https://domain.com/contoh-pembelian</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            {{-- Website Details --}}

                            {{-- Website Description --}}
                            <div class="row mb-3">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Praesent semper nibh eget viverra gravida.
                                    Nam consectetur augue sed risus sollicitudin ultricies.
                                    Mauris vulputate sem eu augue pharetra, in dictum tellus tempus.
                                </p>
                            </div>
                            {{-- Website Description --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table w-100">
                                    <thead>
                                        <tr>
                                            <th class="w-50"><i class="fa fa-hourglass-half"></i> Waktu Pengiriman</th>
                                            <td>3 Hari</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p><i class="fas fa-check text-success"></i> Lorem ipsum dolor sit amet.</p>
                            <p><i class="fas fa-check text-success"></i> Lorem ipsum dolor sit amet.</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-success w-50"><i class="fas fa-shopping-cart"></i> Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section bg-light">
        <div class="section container-fluid">
            <div class="row py-5">
                <div class="col-md-12 text-center d-flex align-items-center justify-content-center">
                    <a href="#" class="btn btn-success w-25"><i class="fas fa-shopping-cart"></i> Tambah</a>
                </div>
            </div>
        </div>
    </div>
@endsection
