@extends('layouts.admin.app')
@section('title', 'Edit Laporan Aset - Lab Apps Dashboard')
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
            <h4 class="card-title">Edit Laporan Aset</h4>
          </div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger" role="alert">
                  <ul class="mb-0">
                      @foreach($errors->all() as $error)
                          <li>{!! $error !!}</li>
                      @endforeach
                  </ul>
              </div>
            @endif

            <form action="{{ route('inventory.update', $inventory) }}" method="POST">
              @csrf
              @method('PUT')
            
              <div class="form-group">
                <label for="brand">Merk</label>
                <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand') ?? $inventory->brand }}">
              </div>

              <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $inventory->name }}">
              </div>

              <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ old('serial_number') ?? $inventory->serial_number }}">
              </div>

              <div class="form-group">
                <label for="category_id">Jenis Barang</label>
                <select name="category_id" id="category_id" class="form-control">
                  <option selected disabled>-- Pilih Jenis Barang --</option>
                  @foreach ($categories as $category)
                      <option {{ $category->id == $inventory->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="buy_date">Tanggal Pembelian</label>
                <input type="date" name="buy_date" id="buy_date" class="form-control" value="{{ $inventory->buy_date }}">
              </div>

              <div class="form-group">
                <label for="unboxing_date">Tanggal Pemakaian</label>
                <input type="date" name="unboxing_date" id="unboxing_date" class="form-control" value="{{ $inventory->unboxing_date }}">
              </div>

              <div class="form-group">
                <label for="condition">Kondisi</label>
                <select name="condition" id="condition" class="form-control">
                  <option disabled selected>-- Pilih Kondisi Barang --</option>
                  <option {{ $inventory->condition == "Baik" ? 'selected' : '' }} value="Baik">Baik</option>
                  <option {{ $inventory->condition == "Rusak" ? 'selected' : '' }} value="Rusak">Rusak</option>
                  <option {{ $inventory->condition == "Hilang" ? 'selected' : '' }} value="Hilang">Hilang</option>
                </select>
              </div>

              <div class="form-group">
                <label for="description">Keterangan</label>
                <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') ?? $inventory->description }}</textarea>
              </div>
              

              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection