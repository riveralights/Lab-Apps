@extends('layouts.admin.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kategori Aset</h3>
            <p class="text-subtitle text-muted">Daftar Aset Berdasarkan Kategori </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
      <div class="col-sm-12 col-md-5">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <p>List Category</p>
            <a href="" class="btn btn-primary btn-sm">Tambah Data</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-category">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($categories as $category)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                          <a href="#" class="btn btn-warning btn-sm">Sunting</a>
                        </td>
                      </tr>
                  @empty
                      
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