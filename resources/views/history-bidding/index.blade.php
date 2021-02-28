@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>History lelang</h3>
                <p class="text-subtitle text-muted">Informasi mengenai history pemenang barang di <strong>Lelangin</strong></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Petugas</li>
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama lelang</th>
                                <th>Nama pemenang</th>
                                <th>Nama petugas</th>
                                <th>Harga akhir</th>
                                <th>Tanggal acc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->bidMaster->title }}</td>
                                <td>{{ $history->user->username }}</td>
                                <td>{{ $history->officer->name }}</td>
                                <td>Rp {{ number_format($history->end_price) }}</td>
                                <td>{{ date('d F Y', strtotime($history->created_at)) }}</td>
                                <td><span class="badge bg-info">Lihat history</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection