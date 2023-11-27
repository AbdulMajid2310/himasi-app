@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2"> Departement <i class="bi bi-diagram-2"></i></h2>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive small ">
    <a href="/dashboard/departements/create" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Tambah Departemen</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Departemen</th>
                <th scope="col" style="width: 60%;">Deskripsi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departements as $departement)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $departement->name }}</td>
                <td>{{ $departement->description }}</td>
                <td>
                    <a href="/dashboard/categories/{{ $departement->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                    <a href="/dashboard/categories/{{$departement->slug}}edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></i></a>
                    <form action="/dashboard/departements/{{$departement->slug}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf

                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
                    </form>

                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection