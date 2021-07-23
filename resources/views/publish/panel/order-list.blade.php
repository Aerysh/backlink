@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Daftar Order')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Penerbit</b></li>
    <li class="breadcrumb-item active">Order</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <p class="lead">Saldo : Rp. 0</p>
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
        <a href="{{route('publish.user_order_list')}}" class="nav-link text-white active">
            Order
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Daftar Order</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center w-100">
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
                                <tr>
                                    <td>    UV68EQVW    </td>
                                    <td>    aerysh.xyz  </td>
                                    <td>    Rp. 50000   </td>
                                    <td>    19 Jul 2021 </td>
                                    <td>
                                        <span class="badge bg-secondary">Belum Selesai</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>    3MFDZBBR    </td>
                                    <td>    google.com  </td>
                                    <td>    Rp. 150000  </td>
                                    <td>    15 Jul 2021 </td>
                                    <td>
                                        <span class="badge bg-secondary">Belum Selesai</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>    Y0DNXTFN        </td>
                                    <td>    facebook.com    </td>
                                    <td>    Rp. 100000      </td>
                                    <td>    13 Jul 2021     </td>
                                    <td>
                                        <span class="badge bg-success">Selesai</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-primary">Detail</a>
                                    </td>
                                </tr>
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
