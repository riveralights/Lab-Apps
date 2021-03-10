@extends('layouts.admin.app')
@section('title', 'Edit Berita Acara - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Berita Acara</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita Acara</li>
                </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
      <div class="col-sm-12 col-md-5">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Edit Berita Acara</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('report.update', $report) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Nama Laboran</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $report->name }}">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="lesson">Nama Pelajaran</label>
                <input type="text" name="lesson" id="lesson" class="form-control @error('lesson') is-invalid @enderror" value="{{ old('lesson') ?? $report->lesson }}">
                @error('lesson')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="laboratory_id">Ruangan Laboratorium</label>
                <select name="laboratory_id" id="laboratory_id" class="form-control">
                  <option disabled selected>-- Pilih Ruangan --</option>
                  @foreach ($laboratories as $laboratory)
                      <option {{ $laboratory->id == $report->laboratory_id ? 'selected' : '' }} value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                  @endforeach
                </select>
                @error('laboratory_id')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="starting_date">Tanggal / Waktu Mulai</label>
                <input type="datetime-local" class="form-control" name="starting_date" id="starting_date">
                @error('starting_date')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="end_date">Tanggal / Waktu Berakhir</label>
                <input type="datetime-local" class="form-control" name="end_date" id="end_date">
                @error('end_date')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="description">Keterangan</label>
                <textarea name="description" id="description" cols="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $report->description }}</textarea>
                @error('description')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="btn btn-sm btn-primary">Simpan Perubahan</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection