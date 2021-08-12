@extends('layouts.master')

@section('title', 'Hasil Pencarian')

@section('content')
    <div class="section py-5">
        <div class="section container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <h5 class="card-title">Filter</h5>
                                <hr/>
                                <form method="GET" action="{{route('marketplace.search_result')}}">
                                    <div class="form-group mb-3">
                                        <label for="categories">Kategori</label>
                                        <select id="categories" class="form-select" name="categories">
                                            <option value="all" selected>Semua Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="domain_authority">Domain Authority</label>
                                        <input type="range" class="form-range" value="10" min="0" max="100" id="domain_authority" name="domain_authority" oninput="this.nextElementSibling.value = this.value">
                                        <output>10</output>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="page_authority">Page Authority</label>
                                        <input type="range" class="form-range" value="10" min="0" max="100" id="page_authority" name="page_authority" oninput="this.nextElementSibling.value = this.value">
                                        <output>10</output>
                                    </div>
                                    <div class="form-group mb-3 text-end">
                                        <button type="submit" class="btn btn-outline-success"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </form>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover text-center w-100" id="websiteList">
                                    <thead>
                                        <tr>
                                            <th>Website</th>
                                            <th>Kategori</th>
                                            <th>DA</th>
                                            <th>PA</th>
                                            <th>Harga</th>
                                            <th>Waktu Pengiriman</th>
                                            <th>Beli</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>
                                                    <a href="{{route('info.website_details', ['id' => $result->id])}}" class="text-dark">
                                                        {{ $result->url }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @foreach ($result->category as $category)
                                                        {{$category->name}}<br>
                                                    @endforeach
                                                </td>
                                                <td>{{ $result->domain_authority }}</td>
                                                <td>{{ $result->page_authority }}</td>
                                                <td>Rp. {{ $result->price }}</td>
                                                <td>{{ $result->delivery_time}} Hari </td>
                                                <td><a class="btn btn-outline-success" href="{{route('cart.store_item', ['id' => $result->id])}}"><i class="fas fa-shopping-cart"></i> Tambah</a>
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

@section('css')

@endsection

@section('js')
<script>
    $(document).ready( function () {
        $('#websiteList').DataTable({
            responsive: true,
            searching: false,
            "ordering": false,
        });
    });
</script>
@endsection
