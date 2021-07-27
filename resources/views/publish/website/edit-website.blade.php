@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Edit Website')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Penerbit</b></li>
    <li class="breadcrumb-item active">Website</li>
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
        <div class="col-md-12">
            @if (Session::has('add-website-success'))
                <div class="alert alert-success" role="alert">
                    {{  Session::get('add-website-success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
                <p class="text-center">Tolong Selesaikan Semua Order (Jika Ada) Sebelum Melakukan Edit Website</p>
            </div>
            <div class="card">
                <div class="card-body">
                    @foreach ($websites as $website)
                    <form method="POST" action="{{route('publish.user_store_website')}}">
                        {{ csrf_field() }}
                        <input type="hidden" id="id" name="id" value="{{    $website->id    }}">
                        <div class="form-group mb-3">
                            <label for="url">Nama Domain</label>
                            <input type="url" id="url" name="url" class="form-control" required placeholder="Nama Domain" value="{{ $website->url   }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi Website</label>
                            <textarea id="description" name="description" class="form-control" rows="5">{{  $website->description   }}</textarea>
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
                            <input type="number" min="0" max="100" id="domain_authority" name="domain_authority" class="form-control" required placeholder="Domain Authority" value="{{ $website->domain_authority  }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="page_authority">Page Authority</label>
                            <input type="number" min="0" max="100" id="page_authority" name="page_authority" class="form-control" required placeholder="Page Authority" value="{{   $website->page_authority    }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Harga</label>
                            <input type="number" id="price" name="price" class="form-control" required placeholder="Harga"  value="{{   $website->price }}">
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
                    @endforeach
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
    <script>
        $(document).ready( function () {
            $('#website_list').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
