@extends('layouts.master')

@section('title', 'Cart')

@section('content')
    <div class="section py-5 bg-light">
        <div class="section container">
            <h5 class="card-title">Checkout</h5>
            <div class="col-md-12 row">
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="col-md-12 row">
                                    <div class="col-md-6">
                                        <p>Item 1</p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <p>Remove</p>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <p class="lead">aerysh.xyz</p>
                                                <small>DA 69 / PA 60</small>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <small class="text-muted">Harga</small>
                                                <p class="lead">Rp. 50000</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postType" id="postType1" checked>
                                                <label class="form-check-label" for="postType1">Tulis Konten Sendiri</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postType" id="postType2">
                                                <label class="form-check-label" for="postType2">Tulisan Dari Pemilik Website <small>(+Rp.75.000)</small></label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <textarea id="post" name="post" rows="10"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="fileTambahan" class="form-label">File Tambahan</label>
                                            <input class="form-control" type="file" id="fileTambahan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 text-end">
                                    {{-- <button type="submit" class="btn btn-success">Checkout</button> --}}
                                    <a href="#" class="btn btn-success">Bayar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total</h5>
                            <div class="row py-3">
                                <div class="col-md-12">
                                    <table class="table table-borderless ">
                                        <tbody>
                                            <tr>
                                                <td width="60%">Website</td>
                                                <td class="text-end">Rp. 50000</td>
                                            </tr>
                                            <tr>
                                                <td width="60%">Penulisan Konten</td>
                                                <td class="text-end">Rp. 0</td>
                                            </tr>
                                            <tr>
                                                <td width="60%"><h5 class="lead">Total</h5></td>
                                                <td class="text-end"><h5 class="lead">Rp. 50000</h5></td>
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
    </div>
@endsection

@section('css')

@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('post');
    </script>
@endsection
