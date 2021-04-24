@extends('layouts.admin.app')
@section('title', 'Edit Password - Lab Apps Dashboard')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Password</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
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
            <h4 class="card-title">Edit Password</h4>
          </div>
          <div class="card-body">
            @if (Session::has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                {!! Session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form action="{{ route('user.password.update') }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="form-group">
                  <label for="current_password">Password Saat ini</label>
                  <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">
                  @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Password Baru</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password-confirm">Konfirmasi Password Baru</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>

              <button type="submit" class="btn btn-sm btn-primary">Update Password</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection