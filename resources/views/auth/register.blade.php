@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 mb-3">
            </div>
            <div class="col-md-4 mb-3 position-absolute top-50 start-50 translate-middle">
                <small><a href="/" class="text-muted py-3" style="text-decoration: none;"><i class="fas fa-chevron-left fa-s"></i> Kembali</a></small>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buat Akun</h5>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message    }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message    }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message    }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password-confirm">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group mb-3">
                                <small class="text-muted">Dengan mendaftar anda telah setuju dengan <a href="#" target="_blank">Kebijakan Layanan</a> kami.</small>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" id="submit" class="btn btn-primary">Register</button>&#9;<small>Sudah Punya Akun ? <a href="{{route('login')}}" style="text-decoration: none;">Login</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
