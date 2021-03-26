@extends('layouts.admin.app')
@section('title', 'Berita Acara - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Laporan Berita Acara</h3>
            <p class="text-subtitle text-muted">Input berita acara mengenai penggunaan ruangan laboratorium </p>
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

      <div class="col-sm-12 col-md-12">

        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible show fade">
            {!! Session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif


        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <p>List Berita Acara</p>
            @can('buat berita')
            <a href="{{ route('report.create') }}" class="btn btn-primary btn-sm">Buat Laporan Baru</a>
            @endcan
          </div>

          @hasanyrole('kajur|teknisi')
          <form action="{{ route('report.monthly') }}" class="row row-cols-lg-auto g-3 align-items-center justify-content-center mx-4 mb-3" method="POST">
            @csrf
            <div class="col-12">
              <label for="start_date" class="visually-hidden">Tanggal Awal</label>
              <div class="input-group">
                <div class="input-group-text">Tanggal Awal</div>
                <input type="date" name="start_date" id="start_date" class="form-control">
              </div>
            </div>
            <div class="col-12">
              <label for="end_date" class="visually-hidden">Tanggal Akhir</label>
              <div class="input-group">
                <div class="input-group-text">Tanggal Akhir</div>
                <input type="date" name="end_date" id="end_date" class="form-control">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" target="_blank" class="btn btn-info">Print Laporan Bulanan</button>
            </div>
          </form>
          @endhasanyrole

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-category">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Guru Peminjam</th>
                    <th>Pelajaran</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($reports as $report)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->lesson }}</td>
                        <td>{{ $report->laboratory->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($report->starting_date)->isoFormat('dddd, D MMMM Y') }}</td>
                        <td>
                          <a href="{{ route('report.show', $report) }}" class="btn btn-info pb-0"><i class="bi bi-eye-fill"></i></a>
                          @can('edit berita')
                          <a href="{{ route('report.edit', $report) }}" class="btn btn-warning pb-0"><i class="bi bi-pencil-fill"></i></a>
                          @endcan
                          @can('hapus berita')
                          <form action="{{ route('report.destroy', $report) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger pb-0" onclick="return confirm('Anda yaking ingin menghapus data {{ $report->name }} ?')"><i class="bi bi-trash2-fill"></i></button>
                          </form>
                          @endcan
                        </td>
                      </tr>
                  @empty
                      <tr>
                        <td colspan="6" class="text-muted text-center">Tidak Ada Data</td>
                      </tr>
                  @endforelse
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection

@push('addon-style')
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/simple-datatables/style.css') }}">
@endpush

@push('addon-script')
  <script src="{{ asset('backend/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
  <script>
      // Simple Datatable
      let table_category = document.querySelector('#table-category');
      let dataTable = new simpleDatatables.DataTable(table_category);
  </script>
@endpush