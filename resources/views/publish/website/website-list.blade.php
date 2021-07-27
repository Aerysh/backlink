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
                                <table id="website_list" class="table table-responsive table-hover w-100 text-center">
                                    <thead>
                                        <tr>
                                            <th hidden>#</th>
                                            <th>    Website </th>
                                            <th>    Kategori    </th>
                                            <th>    DA      </th>
                                            <th>    PA      </th>
                                            <th>    Harga   </th>
                                            <th>    Status  </th>
                                            <th>    Waktu Pengiriman    </th>
                                            <th>    Edit    </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($websites as $website)
                                            <tr>
                                                <td hidden>    {{  $website->id    }}  </td>
                                                <td>    {{  $website->url   }} </td>
                                                <td>
                                                    @foreach ($website->category as $category)
                                                        {{$category->name}}
                                                    @endforeach
                                                </td>
                                                <td>    {{  $website->domain_authority  }}    </td>
                                                <td>    {{  $website->page_authority    }}  </td>
                                                <td>    {{  $website->price }}  </td>
                                                <td>
                                                    @if ($website->status == 'Approved')
                                                        <span class="badge bg-success">{{  $website->status    }}</span>
                                                    @elseif($website->status == 'Declined')
                                                        <span class="badge bg-danger">{{  $website->status    }}</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{  $website->status    }}</span>
                                                    @endif
                                                </td>
                                                <td>    {{  $website->delivery_time }} Hari </td>
                                                <td>
                                                    <a href="{{route('publish.user_edit_website', ['id' => $website->id])}}" class="btn btn-outline-primary">Edit</a>
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
