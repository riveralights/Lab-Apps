@extends('layouts.admin.app')
@section('title', 'Edit Ruangan - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Ruangan Laboratorium</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ruangan Laboratorium</li>
                </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
      <div class="col-sm-12 col-md-3">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Edit Data Ruangan : {{ $laboratory->name }}</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('laboratory.update', $laboratory) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Nama Ruangan</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $laboratory->name }}">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="code">Kode Ruangan</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') ?? $laboratory->code }}">
                @error('code')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="author">Penanggung Jawab Ruangan</label>
                <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') ?? $laboratory->author }}">
                @error('author')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection