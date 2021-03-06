@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hak akses petugas</h3>
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
            </div>
            <div class="card-body">
                <livewire:user-access-index></livewire:user-access-index>
            </div>
        </div>
    </section>
</div>
@endsection