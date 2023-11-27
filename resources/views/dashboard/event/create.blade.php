@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Buat Event Baru </h2>
</div>
<form action="/dashboard/events" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Event</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                @error('description')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
                <input id="description" placeholder="Editor content goes here" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description"></trix-editor>

            </div>
            <div class="mb-3">
                <div class="row align-items-stretch">
                    <div class="col-md-5 ">
                        <div class="d-flex flex-column">
                            <label for="thumbnail" class="form-label ">Thumbnail</label>
                            <div class="img-preview thmb-preview">
                                <!-- <p class="d-block " id="thmb-placeholder">
                                Image (400 x 300px)
                            </p> -->
                                <!-- <img src="/img/admin/default6x4.jpg" class="thmb-preview  img-fluid mb-2"> -->
                            </div>
                            <input class="form-control mt-auto @error('thumbnail') is-invalid @enderror" name="thumbnail" type="file" id="thumbnail" onchange="previewThumbnail()">
                            @error('thumbnail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7 ">
                        <div class="d-flex flex-column">
                            <label for="poster" class="form-label">Banner</label>
                            <div class="img-preview poster-preview">
                                <!-- <p class="d-block " id="poster-placeholder">
                                Image (900 x 400px)
                            </p> -->
                                <!-- <img src="/img/admin/default9x4.jpg" class="poster-prexview  img-fluid d-block mb-2"> -->
                            </div>
                            <input class="form-control mt-auto @error('poster') is-invalid @enderror" name="poster" type="file" id="poster" onchange="previewPoster()">
                            @error('poster')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 ps-5">
            <div class="mb-3">
                <label for="id_event_category" class="form-label">Category</label>
                <select class="form-select" id="id_event_category" name="id_event_category">
                    @foreach($categories as $category)
                    @if(old('id_event_category') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Waktu</label>
                <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time') }}">
                @error('time')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vanue" class="form-label">Tempat </label>
                <input type="vanue" class="form-control @error('vanue') is-invalid @enderror" id="vanue" name="vanue" value="{{ old('vanue') }}">
                @error('vanue')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="htm" class="form-label">Harga Tiket</label>
                <div class="input-group ">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control @error('htm') is-invalid @enderror" name="htm" value="{{ old('htm') }}" id="htm">
                </div>
                @error('htm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="ms-auto">
                <button type="submit" class="btn btn-primary  mt-5">Simpan</button>

            </div>


        </div>
    </div>
</form>


<script>
    // Slug
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })


    // preview img

    function previewThumbnail() {
        const thmb = document.querySelector('#thumbnail');
        const thmbPreview = document.querySelector('.thmb-preview');
        const thmbPlaceholder = document.querySelector('#thmb-placeholder');
        // imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(thmb.files[0]);

        oFReader.onload = function(oFREvent) {
            thmbPreview.style.backgroundSize = 'cover';
            thmbPreview.style.backgroundImage = "url(" + oFREvent.target.result + ")";

        }
    }

    function previewPoster() {
        const poster = document.querySelector('#poster');
        const posterPreview = document.querySelector('.poster-preview');
        const posterPlaceholder = document.querySelector('#poster-placeholder');

        // imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(poster.files[0]);

        oFReader.onload = function(oFREvent) {
            posterPreview.style.backgroundSize = 'cover';
            posterPreview.style.backgroundImage = "url(" + oFREvent.target.result + ")";
        }
    }
</script>
@endsection