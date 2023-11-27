@extends("layout.main")

@section("container")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $post->title }} </h2>
            <p>By. <a href="/blog?author={{$post->author->username}} " class="text-decoration-none"> {{ $post->author->name }} </a> in <a href="/categories/{{ $post->category->slug }} " class="text-decoration-none">{{ $post->category->name }}</a> </p>
            @if($post->image)
            <div style="max-height: 300px; overflow:hidden;">
                <img src="{{ asset('storage/'. $post->image)}}" class="img-fluid mb-5" alt="...">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
            @endif
            {!! $post->body !!}
            <br>
            <a href="/blog">Kembali ke daftar Blog</a>
        </div>
    </div>
</div>

<article class="mb-5">


</article>



@endsection