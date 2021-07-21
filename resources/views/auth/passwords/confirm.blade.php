@extends('layouts.auth')

@section('title', 'Confirm Password')

@section('content')
    <div class="section py-5">
        <div class="section container">
            <div class="col-md-12 row">
                <div class="col-md-4 mb-3">
                </div>
                <div class="col-md-4 mb-3 position-absolute top-50 start-50 translate-middle">
                    <div class="card">
                        <div class="card-body">
                            <h5>Konfirmasi Ulang Password</h5>
                            <form method="POST" action="{{route('password.confirm')}}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Confirm Password</button>
                                    <a class="btn btn-link" href="{{route('password.request')}}">Lupa Password</a>
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
