@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Petugas</h3>
                <p class="text-subtitle text-muted">Informasi mengenai data petugas <strong>Lelangin</strong></p>
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
                <a href="{{ url('/officer/create') }}" class="btn btn-info"><i class="bi-clipboard-plus"></i> Tambah petugas</a>
            </div>
            <div class="card-body">
                {{-- <livewire:officer-index :officers="$officers"></livewire:officer-index> --}}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($officers as $officer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$officer->name}}</td>
                                <td>{{$officer->email}}</td>
                                <td>{{$officer->phone_number}}</td>
                                <td>{{$officer->role->name}}</td>
                                <td>
                                    <a href="{{ url('officer/'. $officer->id . '/edit') }}" class="badge bg-primary"><i class="bi-pencil"></i></a>
                                    <form action="{{ url('officer/' . $officer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah anda yakin akan dihapus?')" class="badge bg-danger" style="border: 0px"><i class="bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $officers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection