@extends('layouts.master')

@section('title', 'Panel Test')

@section('content')
    <header class="py-3 border-bottom">
        <div class="container d-flex flex-wrap align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
        </div>
    </header>
    <div class="section py-5 h-auto">
        <div class="section container">
            <div class="row">
                {{-- Sidebar --}}
                <div class="col-md-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark mb-3 w-100">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-4">Logo</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            @yield('sidebar')
                        </ul>
                    </div>
                </div>
                {{-- Content --}}
                <div class="col-md-9">
                    @yield('panelContent')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

