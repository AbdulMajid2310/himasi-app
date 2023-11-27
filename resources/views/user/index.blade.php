@extends("layout.main")

@section("container")
<!-- Departemen section -->
<h1>Halaman Profile</h1>
{{ $user->name }}
{{ $user->student->nim }}
@endsection