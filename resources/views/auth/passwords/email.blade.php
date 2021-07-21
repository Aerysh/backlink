@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="section py-5">
        <div class="container">
            <div class="row mt-5 d-flex align-items-center">
                <div class="col-md-4 mb-3">
                </div>
                <div class="col-md-4 mb-3 position-absolute top-50 start-50 translate-middle">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <small><a href="{{route('login')}}" class="text-muted py-3" style="text-decoration: none;"><i class="fas fa-chevron-left fa-s"></i> Kembali</a></small>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reset Password</h5>
                            <form action="{{route('password.email')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form group mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
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
