@extends("layout.main")

@section("container")
<?php
//dd($posts[1])
?>

<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    @foreach($events as $event)
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.5); width: 100%; height: 100%;">
            </div>
            <img src="https://source.unsplash.com/1200x300" class="card-img-top" alt="">
            <div class="container">

                <div class="carousel-caption text-start">
                    <h1>
                        {{ $event->name }}
                    </h1>
                    <div class="truncate mb-4 opacity-75">
                        {!! $events[0]->excerpt !!}
                    </div>
                    <a href="" class="btn btn-outline-white">
                        Daftar
                    </a>


                </div>
            </div>
        </div>
    </div>
    @endforeach
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


@endsection