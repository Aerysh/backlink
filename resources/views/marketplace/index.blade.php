@extends('layouts.master')

@section('title','Marketplace')

@section('content')
    <div class="section py-5 container border-bottom">
        {{-- Alerts --}}
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                @if (Session::has('message_1'))
                    <div class="alert alert-info" role="alert">
                        <p class="text-center">{{  Session::get('message_1') }}</p>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
            </div>
        </div>
        {{-- Alerts --}}
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title mb-3">Paling Laris</h5>
                <div class="table-responsive">
                    <table class="table table-hover text-center w-100">
                        <thead>
                            <tr>
                                <th hidden>#</th>
                                <th>Website</th>
                                <th>DA</th>
                                <th>PA</th>
                                <th>Harga</th>
                                <th>Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td hidden>1</td>
                                <td><a class="text-dark" href="#">aerysh.xyz</a></td>
                                <td>69</td>
                                <td>60</td>
                                <td>Rp. 50000</td>
                                <td><a class="btn btn-outline-success" href="{{route('cart.index')}}">+ <i class="fas fa-shopping-cart"></i> Keranjang</a>
                            </tr>
                            <tr>
                                <td hidden>2</td>
                                <td><a class="text-dark" href="#">google.com</a></td>
                                <td>68</td>
                                <td>92</td>
                                <td>Rp. 150000</td>
                                <td><a class="btn btn-outline-success" href="#">+ <i class="fas fa-shopping-cart"></i> Keranjang</a>
                            </tr>
                            <tr>
                                <td hidden>3</td>
                                <td><a class="text-dark" href="#">facebook.com</a></td>
                                <td>62</td>
                                <td>63</td>
                                <td>Rp. 100000</td>
                                <td><a class="btn btn-outline-success" href="#">+ <i class="fas fa-shopping-cart"></i> Keranjang</a>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <h5 class="card-title mb-3">Cari</h5>
                <form action="{{route('marketplace.search_result')}}" method="GET">
                    <div class="form-group mb-3">
                        <label for="categories">Kategori</label>
                        <select class="form-select" id="categories" name="categories" required>
                            <option value="all" selected>Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="section py-5 container border-top">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title mb-3">Terbaru</h5>
                <div class="table-responsive">
                    <table class="table table-hover text-center w-100">
                        <thead>
                            <tr>
                                <th>Website</th>
                                <th>DA</th>
                                <th>PA</th>
                                <th>Harga</th>
                                <th>Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest as $new)
                                    <tr>
                                        <td>
                                            <a href="{{route('info.website_details', ['id' => $new->id])}}" class="text-dark">
                                                {{ $new->url }}
                                            </a>
                                        </td>
                                        <td>{{ $new->domain_authority }}</td>
                                        <td>{{ $new->page_authority }}</td>
                                        <td>{{ $new->price }}</td>
                                        <td>
                                            <form action="{{route('cart.store_item', ['id' => $new->id])}}" method="GET">
                                                <button type="submit" class="btn btn-outline-success">
                                                    <span class="fas fa-shopping-cart"></span> Tambah
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="card-title mb-3">Paling Murah</h5>
                <div class="table-responsive">
                    <table class="table table-hover text-center w-100">
                        <thead>
                            <tr>
                                <th>Website</th>
                                <th>DA</th>
                                <th>PA</th>
                                <th>Harga</th>
                                <th>Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cheapest as $cheap)
                                <tr>
                                    <td>    {{  $cheap->url }}  </td>
                                    <td>    {{  $cheap->domain_authority    }}  </td>
                                    <td>    {{  $cheap->page_authority  }}  </td>
                                    <td>    {{  $cheap->price   }}  </td>
                                    <td>
                                        <form action="{{route('cart.store_item', ['id' => $cheap->id])}}" method="GET">
                                            <button type="submit" class="btn btn-outline-success">
                                                <span class="fas fa-shopping-cart"></span> Tambah
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
