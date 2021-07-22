@extends('layouts.master')

@section('title', 'Kontak Kami')

@section('content')
    <div class="section py-5 bg-light border-bottom">
        <div class="section row my-5">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="display-3">Kontak Kami</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section container py-5">
        <div class="section row my-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md">
                    </div>
                    <div class="col-md-10">
                        <div class="card border-secondary rounded mb-3">
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="name" name="fullname" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Handphone" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <textarea class="form-control" id="message" name="message" placeholder="Pesan untuk Kami" required></textarea>
                                    </div>
                                    <div class="form-group mb-3 text-end">
                                        <button type="button" class="btn btn-info text-white">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="display-6">How Can We Help ?</h2>
                <small class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adiop iscing elit, sed do eiusmod tempor inci didunt ult labore et dolore magna aliqua.</small>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
