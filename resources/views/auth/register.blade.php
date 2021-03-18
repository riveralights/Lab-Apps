@extends('layouts.admin.register')

@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Registrasi</h1>
            <p class="auth-subtitle mb-5">Isi dengan data kamu untuk mendaftar di website kami</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Name" id="name" name="name" value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Kata Sandi" id="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-xl" placeholder="Konfirmasi kata sandi" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Kamu sudah punya akun? <a href="{{ route('login') }}"
                        class="font-bold">Masuk</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>
@endsection
