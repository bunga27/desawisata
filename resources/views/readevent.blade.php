@extends('header')
@section('content')
@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- KETIKA ADA SESSION ERROR  -->
@if (session('error'))
<!-- MAKA TAMPILKAN ALERT DANGER -->
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Event</h4>
                  </div>
                  <div style="text-align:right; margin-right:10px">
                         <a href="/event/create" class="btn btn-success fa fa-plus"></a>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="id_event">NO</th>
                            <th class="kategori">Kategori</th>
                            <th class="judul">Judul</th>
                            <th class="deskripsi">Diskripsi</th>
                            <th class="gambar">Gambar</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $event as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->kategori }}</td>
                                    <td>{{ $event->judul }}</td>
                                    <td>{{ $event->deskripsi }}</td>
                                    <td><img src="{{ asset ($event->gambar) }}" width="100"></td>
                                    <td>

                                        <a href="/event/{{ $event->id_event }}/edit" class="btn btn-success fa fa-edit"></a>
                                        <a href="#" class="btn btn-danger swal-6" data-id="{{ $event->id_event }}">
                                                <form action="{{ url('/wisata/'.$event->id_event) }}" id="delete{{ $event->id_event }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                                <i class="fa fa-trash"></i>
                                            </a>

                                    </td>
                                    </tr>
                                    @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
@endsection
