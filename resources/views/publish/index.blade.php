@extends('layouts.master')

@section('title', 'Jual Backlink di Website Anda')

@section('content')
    <div class="section bg-light py-5 border-bottom">
        <div class="section container">
            <div class="col-md-12 row mb-3">
                <div class="text-center">
                    <h1 class="display-5">Anda Punya Website?</h1>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper nibh eget viverra gravida.</p>
                </div>
            </div>
            <div class="col-md-12 text-center row mb-3">
                <div class="col-md-4">
                    <i class="far fa-clipboard fa-5x mb-2"></i>
                    <p class="h5">Daftarkan Website Anda</p>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper nibh eget viverra gravida.</p>
                </div>
                <div class="col-md-4">
                    <i class="far fa-sticky-note fa-5x mb-2"></i>
                    <p class="h5">Tulis Konten di Website</p>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper nibh eget viverra gravida.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-hand-holding-usd fa-5x mb-2"></i>
                    <p class="h5">Dapatkan Bayaran</p>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper nibh eget viverra gravida.</p>
                </div>
            </div>
            <div class="col-md-12 text-center row mb-3">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    @auth
                        <a href="{{route('publish.user_add_website')}}" class="btn btn-info text-white">Daftarkan Website</a>
                    @else
                        <a href="{{route('login')}}" class="btn btn-info text-white">Daftarkan Website</a>
                    @endauth
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
    <div class="section py-5 border-bottom">
        <div class="section container">
            <div class="row">
                <div class="col-md-6 text-cetner">
                    <img class="img-fluid" src="https://1.bp.blogspot.com/-p8DKixAJrvk/X6hwHnfY6VI/AAAAAAAAFJg/Xc1tkjD5nD0jxEuaBWXYE5vvh0GpTf0xACLcBGAsYHQ/s1280/teknik%2BOn%2Bpage%2BSEO.png" alt="///">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="text-center">
                        <h3 class="bold">Lorem ipsum dolor sit amet</h3>
                        <p class="lead">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Praesent semper nibh eget viverra gravida.
                            Nam consectetur augue sed risus sollicitudin ultricies.
                            Mauris vulputate sem eu augue pharetra, in dictum tellus tempus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section bg-light py-5 mx-0 w-100">
        <div class="section container">
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection
