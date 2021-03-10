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
            <a href="{{ route('inventory.create') }}" class="btn btn-primary btn-sm">Tambah Laporan Aset</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-category">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Merk</th>
                    <th>Nama Aset</th>
                    <th>Jenis Aset</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($inventories as $inventory)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $inventory->brand }}</td>
                        <td>{{ $inventory->name }}</td>
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
                        <td>{{ $inventory->description }}</td>
                        <td>
                          <a href="" class="btn btn-info btn-sm">Detail</a>
                          <a href="" class="btn btn-warning btn-sm">Sunting</a>
                          <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yaking ingin menghapus data {{ $inventory->name }} ?')">Hapus</button>
                          </form>
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