@extends('layouts.auth')

@section('title', 'title')

@section('content')
    <div class="section py-5">
        <div class="section container">
            <div class="col-md-12 row">
                <div class="col-md-4 mb-3">
                </div>
                <div class="col-md-4 mb-3 position-absolute top-50 start-50 translate-middle">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reset Password</h5>
                            <form method="POST" action="{{route('password.update')}}">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password-confirm">Konfirmasi Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="form-group-mb-3">
                                    <button type="submit" class="btn btn-primary">Reset Password</button>
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
