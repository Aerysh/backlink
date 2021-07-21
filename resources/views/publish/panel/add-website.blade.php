@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Dasbor Penerbit')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Penerbit</b></li>
    <li class="breadcrumb-item active">Dasbor</li>
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
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Tambah Website</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group mb-3">
                            <label for="domainName">Nama Domain</label>
                            <input type="text" id="domainName" name="domainName" class="form-control" required placeholder="Nama Domain">
                        </div>
                        <div class="form-group mb-3">
                            <label for="websiteDescription">Deskripsi Website</label>
                            <textarea id="websiteDescription" name="websiteDescription" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="websiteCategories">Kategori</label>
                            <select class="form-select" id="websiteCategories" name="websiteCategories" required>
                                <option value="" selected disabled hidden>Pilih Kategori</option>
                                <option value="Otomotif">Otomotif</option>
                                <option value="Teknologi">Teknologi</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="domainAuthority">Domain Authority</label>
                            <input type="number" min="0" max="100" id="domainAuthority" name="domainAuthority" class="form-control" required placeholder="Domain Authority">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pageAuthority">Page Authority</label>
                            <input type="number" min="0" max="100" id="pageAuthority" name="pageAuthority" class="form-control" required placeholder="Page Authority">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus fa-sm"></i> Submit</button>
                            <a href="{{route('publish.user_website_list')}}" class="btn btn-secondary"><i class="fa fa-chevron-left fa-sm"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- Javascript --}}
@section('js')

@endsection
