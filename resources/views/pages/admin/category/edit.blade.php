@extends('layouts.admin.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kategori Aset</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kategori Aset</li>
                </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
      <div class="col-sm-12 col-md-3">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Edit Kategori</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('category.update', $category) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $category->name }}">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection