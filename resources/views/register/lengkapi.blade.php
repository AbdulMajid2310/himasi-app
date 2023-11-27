@extends('layout.main')


@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-register w-100 m-auto ">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold text-primary">
                        <!-- <i class="fa-regular fa-address-card me-2"></i> -->
                        <i class="fa-solid fa-address-card me-2"></i>
                        Data Pribadi
                    </h5>
                </div>
                <div class="card-body ">
                    @if (session()->has('success'))
                    <small class="text-danger">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        <i>{{ session('success') }}</i>
                    </small>

                    @endif
                    <form action="/mahasiswa/{{ $user->nim }}" method="post">
                        @method('put')
                        @csrf

                        <div class="my-3">
                            <label class="form-label text-primary" for="name">Full Name</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $user->student->name }}" readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label text-primary" for="nim">NIM</label>
                            <input type="text" class="form-control form-control-sm " id="nim" name="nim" value="{{ $user->student->nim }}" readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label text-primary" for="semester">Semester</label>
                            <input type="number" name="semester" class="form-control form-control-sm @error('semester') is-invalid @enderror" id="semester" require value="{{ old('semester') }}">
                            @error('semester')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-primary" for="prodi">Program Studi</label>
                            <input type="text" name="prodi" class="form-control form-control-sm  @error('prodi') is-invalid @enderror" id="prodi" require value="{{ old('prodi') }}">
                            @error('prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-primary" for="asal_kampus">Asal Kampus</label>
                            <input type="text" name="asal_kampus" class="form-control form-control-sm  @error('asal_kampus') is-invalid @enderror" id="asal_kampus" require value="{{ old('asal_kampus') }}">
                            @error('asal_kampus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-primary" for="no_tlp">No. Telephone</label>
                            <input type="text" name="no_tlp" class="form-control form-control-sm  @error('no_tlp') is-invalid @enderror" id="no_tlp" require value="{{ old('no_tlp') }}">
                            @error('no_tlp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Save</button>
                    </form>

                </div>
            </div>

        </main>
    </div>
</div>

@endsection