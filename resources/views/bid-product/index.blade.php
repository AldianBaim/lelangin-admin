@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data lelang</h3>
                <p class="text-subtitle text-muted">Informasi mengenai data lelang dari <strong>Lelangin</strong></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Lelang</li>
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
                <a href="{{ url('bidProduct/create') }}" class="btn btn-info"><i class="bi-clipboard-plus"></i> Buat lelang</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Nama barang</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bids as $bid)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$bid->title}}</td>
                                <td>{{$bid->product->name}}</td>
                                <td><span class="badge bg-{{ $bid->status == 'open' ? 'success' : 'danger' }}">{{ $bid->status == 'open' ? 'Dibuka' : 'Ditutup' }}</span></td>
                                <td>
                                    <a href="{{ url('bidProduct/'. $bid->id) }}" class="badge bg-warning" style="border-radius: 0"><i class="bi-eye"></i></a>
                                    <a href="{{ url('bidProduct/'. $bid->id . '/edit') }}" class="badge bg-primary" style="border-radius: 0;margin: 0 -5px"><i class="bi-pencil"></i></a>
                                    <form action="{{ url('bid/' . $bid->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah anda yakin akan dihapus?')" class="badge bg-danger" style="border: 0px;border-radius: 0;"><i class="bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $bids->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection