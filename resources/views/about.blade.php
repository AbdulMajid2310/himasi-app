@extends("layout.main")

@section("container")
<!-- Departemen section -->
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Departments Of Himasi</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        @foreach($departements as $departement)
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                {!! $departement->icon !!}
            </div>
            <h3 class="fs-2 text-body-emphasis"> {{$departement->name}}</h3>
            <p>{{ $departement->description }}</p>
            <a href="#" class="icon-link">
                Selengkapnya...
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection