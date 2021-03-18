@extends('layouts.admin.login')

@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Sebelum masuk silahkan login terlebih dahulu untuk melanjutkan ke Lab Apps</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" name="email" id="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-gray-600" for="remember">
                        Ingat saya ketika saya masuk
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}"
                        class="font-bold">Daftar</a>.</p>
                @if (Route::has('password.request'))
                    <p><a class="font-bold" href="{{ route('password.request') }}">Lupa kata sandi?</a>.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>
@endsection
