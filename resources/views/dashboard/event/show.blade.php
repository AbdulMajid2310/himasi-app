@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row mt-3">

        <div class="col-md-6">
            <div class="card"">
                <img src=" {{ asset('storage/'. $event->poster) }}" class="img-fluid" alt="...">

                <div class="card-body">
                    <h3> {{ $event->name }} </h3>
                    <small>
                        <div class="me-4 d-inline">
                            <i class="bi-calendar-date"></i>
                            {{ date_format(date_create($event->date),"d M Y ")  }}
                        </div>
                        <div class="me-4 d-inline">
                            <i class=" bi-stopwatch"></i>
                            {{ date_format(date_create($event->time),"H : i ")  }} WIB
                        </div>
                        <div class="me-4 d-inline">
                            <i class=" bi-geo-alt"></i>
                            {{ $event->vanue  }}
                        </div>
                    </small>
                    <p class="card-text" style="text-align: justify;">
                        {!! $event->description !!}
                    </p>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <!-- <div class="card bg-secondary">
                <div class="card-body d-flex">
                    <span class="display-1 text-white-50">
                        <i class="bi bi-people-fill"></i>
                    </span>
                    <div class=" ms-auto text-white-50">
                        90 Peserta
                    </div>

                </div>
            </div> -->
            <div class="card">
                <div class="card-header">
                    <h4>Data Kegiatan</h4>
                </div>
                <div class="card-body mb-5">
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Nama Kegiatan :</div>
                        <div class=" fw-bold">
                            {{ $event->name }}
                        </div>
                    </div>
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Kode Kegiatan :</div>
                        <div class="">
                            {{ $event->code }}
                        </div>
                    </div>
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Kategori Kegiatan :</div>
                        <div class="">
                            {{ $event->category->name }}
                        </div>
                    </div>
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Tanggal :</div>
                        <div class="">
                            {{ date_format(date_create($event->date),"d M Y ")  }}
                        </div>
                    </div>
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Waktu :</div>
                        <div class="">
                            Pukul {{ date_format(date_create($event->time)," H : i ")  }} WIB
                        </div>
                    </div>
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Tempat :</div>
                        <div class="">
                            {{ $event->vanue }}
                        </div>
                    </div>
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Harga Tiket :</div>
                        <div class="">
                            Rp. {{ $event->htm }}
                        </div>
                    </div>
                    <div class="d-flex border-bottom py-2">
                        <div class="col-md-4 ">Status :</div>
                        <div class="">
                            <span class="badge text-bg-success px-4">Dibuka</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection