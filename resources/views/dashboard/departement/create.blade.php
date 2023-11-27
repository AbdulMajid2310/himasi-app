@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Buat departemen baru </h2>
</div>
<div class="col-lg-8">
    <form action="/dashboard/departements" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Departemen</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3 ">
            <label for="icon" class="form-label">Icon Departemen</label>
            <div class="d-flex">
                <div class="card col-2 bg-white me-3">
                    <span class="icon-preview text-center fs-1"></span>
                </div>
                <div class="col-9">
                    <input type="text" value="{{ old('icon') }}" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" onchange="previewIcon()" style="font-family: 'Source Code Pro', monospace;">
                    <small class="form-text"><i class="bi bi-info-circle"></i> Gunakan icon dari <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap</a>, copy kemudian pastekan disini! </small>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" value="{{ old('icon') }}"></textarea>
            @error('description')
            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    // preview img

    function previewIcon() {
        const icon = document.querySelector('#icon');
        const iconPreview = document.querySelector('.icon-preview');
        iconPreview.innerHTML = icon.value

    }
</script>
@endsection