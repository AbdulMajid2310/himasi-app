@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-8 ">
            <h2>{{ $post->title }} </h2>
            <a href="/dashboard/posts" class="btn btn-success my-3">
                <i class="bi bi-arrow-left"></i>
                Back to All posts
            </a>
            <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-warning my-3">
                <i class="bi bi-pencil-square"></i>
                Edit
            </a>
            <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i> Delete</button>
            </form>
            @if($post->image)
            <div style="max-height: 300px; overflow:hidden;">
                <img src="{{ asset('storage/'. $post->image)}}" class="img-fluid mb-5" alt="...">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" class="img-fluid mb-5" alt="...">
            @endif
            {!! $post->body !!}
            <br>
            <a href="/blog">Kembali ke daftar Blog</a>
        </div>
    </div>
</div>

@endsection