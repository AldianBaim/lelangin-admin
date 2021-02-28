@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Detail Lelang</h3>
                <p class="text-subtitle text-muted">Detail data lelang <strong>Lelangin</strong></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/bidProduct') }}">Lelang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail data barang yang di lelang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>Judul lelang</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <span>{{ $bid->title }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Nama barang</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <span>{{ $bid->product->name }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Foto barang</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <img src="{{ asset('storage/images/' . $bid->product->image) }}" class="img-thumbnail" width="50%" alt="">
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Lokasi barang</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <span>{{ $bid->city }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Tanggal mulai</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <span>{{ date('d M Y', strtotime($bid->date_start)) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Tanggal berakhir</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <span>{{ date('d M Y', strtotime($bid->date_end)) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Status</b></label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <span class="badge bg-success">{{ $bid->status == 'open' ? 'Dibuka' : '' }}</span>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <a href="{{ url('bidProduct') }}" class="btn btn-primary">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection