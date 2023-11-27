@extends('layout.main')


@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-register w-100 m-auto ">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold text-primary">
                        <i class="fa-solid fa-pen-to-square me-2"></i>
                        Registrasi
                    </h5>
                </div>
                <div class="card-body">

                    <form action="/register" method="post">
                        @csrf
                        <div class="mb-3 ">
                            <label for="name" class="form-label text-primary">Full name</label>
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" require value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label text-primary">NIM</label>
                            <input type="text" class="form-control form-control-sm @error('nim') is-invalid @enderror" id="nim" name="nim" require value="{{ old('nim') }}">
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-primary">Email address</label>
                            <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" require value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-primary">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm  @error('password') is-invalid @enderror" id="password" require>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label text-primary">Confirm Password</label>
                            <input type="password" name="confirm-password" class="form-control form-control-sm  @error('confirm-password') is-invalid @enderror" id="confirm-password" require>
                            @error('confirm-password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Register</button>
                    </form>

                </div>
            </div>

            <small class="text-center d-block mt-3">Alredy Registered? <a href="/login">Login</a></small>
        </main>
    </div>
</div>

@endsection