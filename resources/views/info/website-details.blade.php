@extends('layouts.master')

@section('title', 'Website Details')

@section('content')
    <div class="section py-5">
        <div class="section container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($websites as $website)
                                {{-- Website Info --}}
                                <div class="row mb-3">
                                    <div class="col-md-1 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-globe-asia fa-3x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="lead">{{ $website->url }}</p>
                                        <a href="{{ $website->url }}" target="_blank" class="text-muted"><small>Buka Website</small></a>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <p class="h4">Rp. {{ $website->price }}</p>
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
                                                <h2 class="text-primary">{{ $website->domain_authority }}</h2>
                                                <small class="text-muted">Domain Authority</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body bg-light text-center">
                                                <h2 class="text-primary">{{ $website->page_authority }}</h2>
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
                                                <td>
                                                    @foreach ($website->category as $category)
                                                        <p>{{ $category->name }}</p>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="w-50">Waktu Pengiriman</th>
                                                <td>{{ $website->delivery_time }} Hari</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                {{-- Website Details --}}

                                {{-- Website Description --}}
                                <div class="row mb-3">
                                    <p>
                                        {{ $website->description }}
                                    </p>
                                </div>
                                {{-- Website Description --}}
                            @endforeach
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
                                            <td>{{ $website->delivery_time }} Hari</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p><i class="fas fa-check text-success"></i> Lorem ipsum dolor sit amet.</p>
                            <p><i class="fas fa-check text-success"></i> Lorem ipsum dolor sit amet.</p>
                            <div class="d-flex justify-content-center">
                                <form action="{{route('cart.store_item', ['id' => $website->id])}}" method="GET">
                                    <button type="submit" class="btn btn-success">
                                        <span class="fas fa-shopping-cart"></span> Tambah
                                    </button>
                                </form>
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
                    <form action="{{route('cart.store_item', ['id' => $website->id])}}" method="GET">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-shopping-cart"></i> Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
