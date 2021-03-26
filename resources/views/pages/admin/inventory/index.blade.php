@extends('layouts.admin.app')
@section('title', 'Laporan Aset - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Laporan Aset</h3>
            <p class="text-subtitle text-muted">Inventaris Laporan Aset</p>
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

      <div class="col-sm-12 col-md-12">

        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible show fade">
            {!! Session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif


        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <p>Daftar Aset</p>
            @can('buat laporan')
            <a href="{{ route('inventory.create') }}" class="btn btn-primary btn-sm">Tambah Laporan Aset</a>
            @endcan
          </div>

          @hasanyrole('kajur|teknisi')
          <form action="{{ route('inventory.monthly') }}" class="row row-cols-lg-auto g-3 align-items-center justify-content-center mx-4 mb-3" method="POST">
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
                    <th>Merk</th>
                    <th>Nama Aset</th>
                    <th>Serial Number</th>
                    <th>Jenis Aset</th>
                    <th>Kondisi</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($inventories as $inventory)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $inventory->brand }}</td>
                        <td>{{ $inventory->name }}</td>
                        <td>{{ $inventory->serial_number }}</td>
                        <td>{{ $inventory->category->name }}</td>
                        <td>
                          @if($inventory->condition == 'Rusak')
                            <span class="badge bg-danger">{{ $inventory->condition }}</span>
                          @elseif($inventory->condition == 'Baik')
                            <span class="badge bg-success">{{ $inventory->condition }}</span>
                          @else
                            <span class="badge bg-warning">{{ $inventory->condition }}</span>
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('inventory.show', $inventory) }}" class="btn btn-info btn-sm">Detail</a>
                          @can('edit laporan')
                          <a href="{{ route('inventory.edit', $inventory) }}" class="btn btn-warning btn-sm">Sunting</a>
                          @endcan
                          @can('hapus laporan')
                          <form action="{{ route('inventory.destroy', $inventory) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yaking ingin menghapus data {{ $inventory->name }} ?')">Hapus</button>
                          </form>
                          @endcan
                        </td>
                      </tr>
                  @empty
                      <tr>
                        <td colspan="7" class="text-muted text-center">Tidak Ada Data</td>
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