@extends('layouts.master')

@section('title', 'Cart')

@section('content')
    <div class="section py-5 bg-light">
        <div class="section container">
            <h5 class="card-title">Checkout</h5>
            <div class="col-md-12 row">

                <div class="col-md-8 mb-3">
                    @if (Session::has('message_1'))
                        <div class="alert alert-info" role="alert">
                            {{  Session::get('message_1') }}
                        </div>
                    @elseif (Session::has('message_2'))
                        <div class="alert alert-success" role="alert">
                            {{  Session::get('message_2') }}
                        </div>
                    @endif
                    @foreach (Cart::content() as $row)
                    <form action="{{route('payment.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="card mb-3">
                        <div class="card-body">
                            <input type="hidden" id="id" name="id[{{$loop->index}}]" value={{$row->rowId}}>
                            <div class="text-end">
                                <a href="{{route('cart.delete_item', ['id' => $row->rowId])}}" class="btn btn-outline-danger">Hapus Item</a>
                            </div>
                            <div class="card my-3">
                                <div class="card-body">
                                    <div class="col-md-12 row">
                                        <div class="col-md-4">
                                            <p class="lead">{{ $row->name }}</p>
                                            <small>DA {{ $row->options->domain_authority }} / PA {{ $row->options->page_authority }}</small>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <small class="text-muted">Harga</small>
                                            <p class="lead">Rp. {{ $row->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card my-3">
                                <div class="card-body">
                                    {{-- <div class="form-group mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="postType{{$loop->index}}" id="postType{{$loop->index}}" checked>
                                            <label class="form-check-label" for="postType1">Tulis Konten Sendiri</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="postType{{$loop->index}}" id="postType{{$loop->index}}">
                                            <label class="form-check-label" for="postType2">Tulisan Dari Pemilik Website <small>(+Rp.75.000)</small></label>
                                        </div>
                                    </div> --}}
                                    <div class="form-group mb-3">
                                        <label for="post_{{$loop->index}}" class="form-label">Isi Konten</label>
                                        <textarea class="editor" id="post_{{$loop->index}}" name="post[{{$loop->index}}]" rows="10" required>{{ $row->options->details }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="fileTambahan" class="form-label">File Tambahan</label>
                                        <input class="form-control" type="file" id="fileTambahan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total</h5>
                            <div class="row py-3">
                                <div class="col-md-12">
                                    <table class="table table-borderless ">
                                        <tbody>
                                            <tr>
                                                <td width="60%">Website</td>
                                                <td class="text-end">Rp. {{ Cart::subtotal() }}</td>
                                            </tr>
                                            <tr>
                                                <td width="60%">Penulisan Konten</td>
                                                <td class="text-end">Rp. 0</td>
                                            </tr>
                                            <tr>
                                                <td width="60%"><h5 class="lead">Total</h5></td>
                                                <td class="text-end"><h5 class="lead">Rp. {{ Cart::total() }}</h5></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mb-3">
                                        <label>Pilih Metode Pembayaran</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_method" id="payment_method1" checked value="transfer">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Transfer Bank
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_method" id="payment_method2" value="saldo">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Saldo Website
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success w-50">Bayar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        for(var i = 0; i < 100; i++){
            CKEDITOR.replace('post_'+i);
        }
    </script>
@endsection
