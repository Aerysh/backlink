@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Website')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Penerbit</b></li>
    <li class="breadcrumb-item active">Website</li>
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
        <a href="{{route('publish.user_website_list')}}" class="nav-link text-white active">
            Website
        </a>
    </li>
    <hr>
    <li>
        <a href="{{route('publish.user_order_list')}}" class="nav-link text-white">
            Order
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title lead me-auto">Website Saya</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{route('publish.user_add_website')}}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Tambah Website</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-responsive table-hover w-100">
                                    <thead>
                                        <tr>
                                            <th>Website</th>
                                            <th>Kategori</th>
                                            <th>DA</th>
                                            <th>PA</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>aerysh.xyz</td>
                                            <td>Other</td>
                                            <td>69</td>
                                            <td>60</td>
                                            <td>Rp. 50000</td>
                                            <td>
                                                <span class="badge bg-success">Diterima</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>google.com</td>
                                            <td>Other</td>
                                            <td>68</td>
                                            <td>92</td>
                                            <td>Rp. 150000</td>
                                            <td>
                                                <span class="badge bg-success">Diterima</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>facebook.com</td>
                                            <td>Other</td>
                                            <td>62</td>
                                            <td>63</td>
                                            <td>Rp. 100000</td>
                                            <td>
                                                <span class="badge bg-success">Diterima</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
