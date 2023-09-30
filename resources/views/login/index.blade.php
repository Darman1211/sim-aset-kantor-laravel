@extends('layouts.main')

@section('data')

<div class="row justify-content-center">
    <div class="col-md-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- alert yang akan ditampilkan saat login gagal --}}
        @if (session()->has('LoginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('LoginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <img class="mb-4" src="/img/logo.png" alt="" width="250">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
            </form>

            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register
                    Now!</a></small>
        </main>
    </div>
</div>

@endsection
