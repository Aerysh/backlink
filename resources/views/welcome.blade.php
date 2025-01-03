@extends('layouts.master')

@section('title', 'Backlink')

@section('content')
    <div class="section bg-light py-5 pl-0 mx-0 border-bottom">
        <div class="section container my-5">
            <div class="row">
                <div class="text-end col-md-6 mb-3">
                    <h1 class="fw-light">Beli Layanan <b>Berkualitas</b></h1>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="/marketplace" class="btn btn-info text-white">Marketplace</a>
                </div>
                <div class="text-start col-md-6 mb-3">
                    <h1 class="fw-light">Daftarkan & Dapatkan <b>Uang</b></h1>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="/publish" class="btn btn-info text-white">Daftarkan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section py-5 border-bottom">
        <div class="section container my-5">
            <div class="col-md-12 row">
                <div class="col-md-6 mb-3">
                    <div class="text-center">
                        <img src="{{asset('assets/img/SEO-amico.svg')}}" class="img-fluid" width="400" height="400" alt="SEO Amico">
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center mb-3">
                    <div>
                        <h4 class="fw-light">Mengapa Kami ?</h4>
                        <p class="lead text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper nibh eget viverra gravida. Nam consectetur augue sed risus sollicitudin ultricies. Mauris vulputate sem eu augue pharetra, in dictum tellus tempus.
                        </p>
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
