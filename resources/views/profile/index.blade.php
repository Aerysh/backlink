@extends('layouts.master')

{{-- Judul Halaman --}}
@section('title', 'Insert Title')

{{-- Konten --}}
@section('content')
    <div class="section py-5">
        <div class="section container">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    @if(Session::has('errors'))
                        <div class="alert alert-danger" role="alert">
                            <p class="text-center">Ada Yang Salah, Coba Lagi !</p>
                        </div>
                    @endif
                    @if (Session::has('profile-update-success'))
                        <div class="alert alert-success" role="alert">
                            <p class="text-center">{{  Session::get('profile-update-success') }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title lead">Profil</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('profile.update')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" disabled value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" disabled value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="current_password">Password Sekarang</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="new_password">Password Baru</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="new_confirm_password">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- JS --}}
@section('js')

@endsection
