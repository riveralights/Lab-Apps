@extends('layouts.admin.app')
@section('title', 'Hak Akses - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Hak Akses</h3>
            <p class="text-subtitle text-muted">Halaman untuk memberikan <i>Roles and Permission</i></p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hak Akses</li>
                </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="page-content">
    <section class="row">

      <div class="col-sm-12 col-md-7">

        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible show fade">
            {!! Session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif


        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <p>List User</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-category">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ print_r($user->getRoleNames()[0], 1) }}</td>
                        <td>
                            <a href="{{ route('setting.edit', $user->id) }}" class="btn btn-warning btn-sm">Sunting</a>
                        </td>
                      </tr>
                  @empty
                      <tr>
                        <td colspan="5" class="text-muted text-center">Tidak Ada Data</td>
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