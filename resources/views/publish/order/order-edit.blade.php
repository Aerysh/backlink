@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Publisher Dashboard')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Publisher</b></li>
    <li class="breadcrumb-item active">Order</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <p class="lead">Saldo : Rp. {{  Auth::user()->balance   }}</p>
    </li>
    <hr>
    <li>
        <a href="{{route('publish.user_dashboard')}}" class="nav-link text-white">
            Dashboard
        </a>
    </li>
    <li>
        <a href="{{route('publish.user_website_list')}}" class="nav-link text-white">
            Website
        </a>
    </li>
    <hr>
    <li>
        <a href="{{route('publish.user_order_list')}}" class="nav-link text-white active">
            Order
        </a>
    </li>
    <li>
        <a href="{{route('publisher.user_withdraw_index')}}" class="nav-link text-white">
            Penarikan
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Edit Order</h5>
                </div>
                <div class="card-body">
                    @foreach ($orders as $order)
                    <form action="{{route('publish.user_update_order', ['id' => $order->id])}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" id="order_id" name="order_id" value="{{   $order->id  }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_number">Nomor Order</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" value="{{ $order->order_number    }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="website">Website</label>
                            @foreach ($order->website as $website)
                                <input type="text" class="form-control" id="website" name="website" value="{{   $website->url  }}" disabled>
                            @endforeach
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control" id="price" name="price" value="Rp. {{   $order->price   }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Keterangan</label>
                            <textarea class="form-control" id="keterangan" disabled>{{  $order->details }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="result">Hasil Pekerjaan</label>
                            <input type="url" class="form-control" id="result" name="result" placeholder="Input Hasil Pekerjaan">
                        </div>
                        <div class="form-group mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- Javascript --}}
@section('js')
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('keterangan');
    </script>
@endsection
