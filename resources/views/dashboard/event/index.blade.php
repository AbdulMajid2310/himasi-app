@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Event Lists </h2>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive small ">
    <a href="/dashboard/events/create" class="btn btn-primary mb-3"><i class="bi-plus-square"></i> Buat Event Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Event</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Tempat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->category->name }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->time }}</td>
                <td>{{ $event->vanue }}</td>
                <td>
                    <a href="/dashboard/events/{{ $event->code }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                    <a href="/dashboard/events/{{$event->code}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></i></a>
                    <form action="/dashboard/events/{{$event->code}}" method="post" class="d-inline">
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