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
        <p class="lead">Saldo : Rp. {{  Auth::user()->balance   }}</p>
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
        <div class="col-md">
        </div>
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Tambah Website</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('publish.user_store_website')}}">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="url">Nama Domain</label>
                            <input type="url" id="url" name="url" class="form-control" required placeholder="Nama Domain">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi Website</label>
                            <textarea id="description" name="description" class="form-control" rows="5" placeholder="Deskripsi Singkat Website"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Kategori Website</label>
                            <select class="form-select" id="categories_id" name="categories_id[]" required multiple>
                                <option value="" selected disabled hidden>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="domain_authority">Domain Authority</label>
                            <input type="number" min="0" max="100" id="domain_authority" name="domain_authority" class="form-control" required placeholder="Domain Authority">
                        </div>
                        <div class="form-group mb-3">
                            <label for="page_authority">Page Authority</label>
                            <input type="number" min="0" max="100" id="page_authority" name="page_authority" class="form-control" required placeholder="Page Authority">
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Harga</label>
                            <input type="number" id="price" name="price" class="form-control" required placeholder="Harga">
                        </div>
                        <div class="form-group mb-3">
                            <label for="delivery_time">Estimasi Waktu Pengiriman</label>
                            <select class="form-select" id="delivery_time" name="delivery_time" required>
                                <option value="" selected disabled hidden>Estimasi Waktu Pengiriman</option>
                                <option value="3">3 Hari</option>
                                <option value="7">7 Hari</option>
                                <option value="14">14 Hari</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus fa-sm"></i> Submit</button>
                            <a href="{{route('publish.user_website_list')}}" class="btn btn-secondary"><i class="fa fa-chevron-left fa-sm"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md">
        </div>
    </div>
@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- Javascript --}}
@section('js')

@endsection
