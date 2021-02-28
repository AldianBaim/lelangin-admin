@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Barang</h3>
                <p class="text-subtitle text-muted">Informasi mengenai data barang <strong>Lelangin</strong></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">

        <div class="card">
            <div class="card-header">
                @if(session()->has('message'))
                <div>
                    {{ session('message') }}
                </div>
                @endif
                <a href="{{ url('product/create') }}" class="btn btn-info"><i class="bi-clipboard-plus"></i> Input barang</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Gambar</th>
                                <th>Jumlah</th>
                                <th>Harga awal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/images/' . $product->image) }}" class="img-thumbnail" width="100" alt="">
                                </td>
                                <td>{{$product->qty}}</td>
                                <td>
                                    <button class="badge bg-success" style="border: 0">Rp {{ number_format($product->first_price)}}</button>
                                </td>
                                <td>
                                    <a href="{{ url('product/'. $product->id . '/edit') }}" class="badge bg-primary" style="border-radius: 0"><i class="bi-pencil"></i></a>
                                    <form action="{{ url('product/' . $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah anda yakin akan dihapus?')" class="badge bg-danger" style="border: 0px;border-radius: 0;margin: 0 -5px"><i class="bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection