@extends('layouts.admin.app')
@section('title', 'Laporan Aset Baru - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Laporan Aset</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Aset</li>
                </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
      <div class="col-sm-12 col-md-4">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Tambah Laporan Aset Baru</h4>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              @csrf

              <div class="form-group">
                <label for="brand">Merk</label>
                <input type="text" name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand') }}">
                @error('brand')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="category_id">Jenis Barang</label>
                <select name="category_id" id="category_id" class="form-control">
                  <option selected disabled>-- Pilih Jenis Barang --</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="buy_date">Tanggal Pembelian</label>
                <input type="date" name="buy_date" id="buy_date" class="form-control">
                @error('buy_date')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="unboxing_date">Tanggal Pemakaian</label>
                <input type="date" name="unboxing_date" id="unboxing_date" class="form-control">
                @error('unboxing_date')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="condition">Kondisi</label>
                <select name="condition" id="condition" class="form-control">
                  <option disabled selected>-- Pilih Kondisi Barang --</option>
                  <option value="Baik">Baik</option>
                  <option value="Rusak">Rusak</option>
                  <option value="Hilang">Hilang</option>
                </select>
                @error('condition')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="description">Keterangan</label>
                <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
              </div>
              

              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection