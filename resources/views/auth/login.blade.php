@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <div class="section">
        <div class="section container">
            <div class="row mt-5 d-flex align-items-center">
                <div class="col-md-4 mb-3">
                </div>
                <div class="col-md-4 mb-3 position-absolute top-50 start-50 translate-middle">
                    <small><a href="/" class="text-muted py-3" style="text-decoration: none;"><i class="fas fa-chevron-left fa-s"></i> Kembali</a></small>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Masuk</h5>
                            <form action="{{route('login')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Ingat Saya
                                    </label>

                                </div>
                                <div class="form-group mb-3">
                                    <a href="{{route('password.request')}}" >Lupa Password</a>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" id="submit" class="btn btn-primary" name="submit">Login</button>
                                    &#9;<small>Belum Punya Akun ? <a href="{{route('register')}}" style="text-decoration: none;">Register</a></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
