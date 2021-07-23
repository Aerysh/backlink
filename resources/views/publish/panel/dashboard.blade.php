@extends('layouts.panel')

{{-- Judul Halaman --}}
@section('title', 'Dasbor Penerbit')

{{-- Konten Breadcrumb --}}
@section('breadcrumb')
    <li class="breadcrumb-item"><b>Penerbit</b></li>
    <li class="breadcrumb-item active">Dasbor</li>
@endsection

{{-- Konten Sidebar --}}
@section('sidebar')
    <li>
        <p class="lead">Saldo : Rp. 0</p>
    </li>
    <hr>
    <li>
        <a href="{{route('publish.user_dashboard')}}" class="nav-link text-white active">
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
        <a href="{{route('publish.user_order_list')}}" class="nav-link text-white">
            Order
        </a>
    </li>
@endsection

{{-- Konten Utama --}}
@section('panelContent')
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Total Penghasilan</h5>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="earningChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Order Aktif</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">3</h1>
                    <h5 class="text-center text-muted">Order</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Jumlah Website</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-muted text-center">3</h1>
                    <h5 class="text-center text-muted">Website</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title lead">Order</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center w-100">
                            <thead>
                                <tr>
                                    <th>    Website </th>
                                    <th>    Harga   </th>
                                    <th>    Tanggal </th>
                                    <th>    Status  </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>    aerysh.xyz  </td>
                                    <td>    Rp. 50000   </td>
                                    <td>    19 Jul 2021 </td>
                                    <td>
                                        <span class="badge bg-secondary">Belum Selesai</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>    google.com  </td>
                                    <td>    Rp. 150000  </td>
                                    <td>    15 Jul 2021 </td>
                                    <td>
                                        <span class="badge bg-secondary">Belum Selesai</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>    facebook.com    </td>
                                    <td>    Rp. 100000      </td>
                                    <td>    13 Jul 2021     </td>
                                    <td>
                                        <span class="badge bg-success">Selesai</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-end">
                            <a href="#" class="btn btn-outline-primary">Lihat Semua</a>
                        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Penghasilan',
                data: [150000, 50000, 200000, 250000, 300000, 100000, 50000],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };



        var myChart = new Chart(
            document.getElementById('earningChart'),
            config
        );
    </script>
@endsection
