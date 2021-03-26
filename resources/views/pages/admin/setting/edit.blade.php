@extends('layouts.admin.app')
@section('title', 'Edit Hak Akses - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Hak Akses</h3>
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
      <div class="col-sm-12 col-md-4">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Edit Hak Akses</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('setting.update', $user->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="name">Nama Pengguna</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name }}">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">Email Pengguna</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}">
                @error('email')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="role">Roles</label>
                <select name="role" id="role" class="form-control" required>
                    <option disabled selected>-- Pilih Roles --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                </div>

                <div class="form-group">
                    <label for="permission">Permissions</label>
                    <select name="permission[]" id="permission" multiple="multiple" class="form-control choices form-select multiple-remove choices__input" required>
                        <option selected disabled>-- Pilih Permission --</option>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                    </select>
                </div>

              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection

@push('addon-style')
        <link rel="stylesheet" href="{{ asset('backend/assets/vendors/choices.js/choices.min.css') }}" />
@endpush
@push('addon-script')
        <script src="{{ asset('backend/assets/vendors/choices.js/choices.min.js') }}"></script>
@endpush