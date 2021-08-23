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
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert alert-info" role="alert">
                    <p class="text-center">{{  Session::get('message') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Daftar Order</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center w-100" id="orderList">
                            <thead>
                                <tr>
                                    <th>    #   </th>
                                    <th>    Order   </th>
                                    <th>    Website </th>
                                    <th>    Harga   </th>
                                    <th>    Tanggal </th>
                                    <th>    Deadline    </th>
                                    <th>    Status  </th>
                                    <th>      </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($websites as $website)
                                    <tr>
                                        <td>    {{  $loop->index+1  }}  </td>
                                        <td>
                                                {{  $website->order_number    }}
                                        </td>
                                        <td>    {{  $website->name   }}  </td>
                                        <td>    {{  $website->price }}    </td>
                                        <td>    {{  date('d-M-Y h:i:s', strtotime($website->created_at))  }}    </td>
                                        <td>    {{  date('d-m-Y h:i:s', strtotime($website->created_at . '+' . $website->delivery_time . ' days'))}}
                                        <td>
                                            <div class="badge bg-info">{{  $website->order_status    }}</div>
                                        </td>
                                        <td>
                                            @if ($website->order_status == "Selesai")
                                                <a href="#" class="btn btn-outline-primary disabled" >Lihat</a>
                                            @else
                                                <a href="{{ route('publish.user_show_order', ['id' => $website->id])}}" class="btn btn-outline-primary">Lihat</a>
                                            @endif
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
<script>
    $(document).ready( function () {
        $('#orderList').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
