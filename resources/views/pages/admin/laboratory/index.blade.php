@extends('layouts.admin.app')
@section('title', 'Ruangan Laboratorium - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Ruangan Laboratorium</h3>
            <p class="text-subtitle text-muted">Daftar ruangan laboratorium yang tersedia. </p>
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

      <div class="col-sm-12 col-md-8">

        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible show fade">
            {!! Session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif


        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <p>List Ruangan Laboratorium</p>
            <a href="{{ route('laboratory.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-laboratory">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Ruangan</th>
                    <th>Kode Ruangan</th>
                    <th>Penanggung Jawab</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($laboratories as $laboratory)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laboratory->name }}</td>
                        <td>{{ $laboratory->code }}</td>
                        <td>{{ $laboratory->author }}</td>
                        <td>
                          <a href="{{ route('laboratory.edit', $laboratory) }}" class="btn btn-warning btn-sm">Sunting</a>
                          <form action="{{ route('laboratory.destroy', $laboratory) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yaking ingin menghapus data {{ $laboratory->name }} ?')">Hapus</button>
                          </form>
                        </td>
                      </tr>
                  @empty
                      <tr>
                        <td colspan="3" class="text-muted text-center">Tidak Ada Data</td>
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
      let table_laboratory = document.querySelector('#table-laboratory');
      let dataTable = new simpleDatatables.DataTable(table_laboratory);
  </script>
@endpush