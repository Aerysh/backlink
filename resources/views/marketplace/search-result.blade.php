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
                                <form method="POST" action="">
                                    <div class="form-group mb-3">
                                        <label for="domainName">Domain</label>
                                        <input type="text" id="domainName" class="form-control" name="domainName" placeholder="example.com">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="categories">Kategori</label>
                                        <select id="categories" class="form-select" name="categories">
                                            <option value="" selected hidden>Semua Kategori</option>
                                            <option value="">Otomotif</option>
                                            <option value="">Bisnis</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="DARange">Domain Authority</label>
                                        <input type="range" class="form-range" value="10" min="0" max="100" id="DARange" name="DARange" oninput="this.nextElementSibling.value = this.value">
                                        <output>10</output>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="PARange">Page Authority</label>
                                        <input type="range" class="form-range" value="10" min="0" max="100" id="PARange" name="PARange" oninput="this.nextElementSibling.value = this.value">
                                        <output>10</output>
                                    </div>
                                    <div class="form-group mb-3 text-end">
                                        <button type="button" class="btn btn-outline-success"><i class="fas fa-search"></i> Cari</button>
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
                                <table class="table table-stripped table-hover text-center w-100">
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
                                        <tr>
                                            <td hidden>1</td>
                                            <td><a class="text-dark" href="#">aerysh.xyz</a></td>
                                            <td>69</td>
                                            <td>60</td>
                                            <td>Rp. 50000</td>
                                            <td><a class="btn btn-outline-success" href="{{route('marketplace.cart')}}">+ <i class="fas fa-shopping-cart"></i> Keranjang</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
