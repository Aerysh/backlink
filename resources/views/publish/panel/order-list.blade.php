@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Daftar Order')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Penerbit</b></li>
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
            Dasbor
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
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Daftar Order</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center w-100">
                            <thead>
                                <tr>
                                    <th>    Order   </th>
                                    <th>    Website </th>
                                    <th>    Harga   </th>
                                    <th>    Tanggal </th>
                                    <th>    Status  </th>
                                    <th>    Edit  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($websites as $website)
                                    <tr>
                                        <td>
                                            @foreach ($website->order as $order)
                                                {{  $order->order_number    }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{  $website->url   }}" target="_blank">{{  $website->url   }}</a>
                                        </td>
                                        <td>    {{  $order->price }}    </td>
                                        <td>    {{  date('d-M-Y h:m:s', strtotime($order->created_at))  }}    </td>
                                        <td>    {{  $order->order_status    }}  </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- Javascript --}}
@section('js')

@endsection
