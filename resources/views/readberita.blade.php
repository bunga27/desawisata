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
                    <h4>Berita</h4>
                  </div>
                  <div style="text-align:right; margin-right:10px">
                         <a href="/berita/create" class="btn btn-success fa fa-plus"></a>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="id_berita">NO</th>
                            <th class="nama_berita">Berita</th>
                            <th class="deskripsi">Diskripsi</th>
                            <th class="gambar">Gambar</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $berita as $berita)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $berita->deskripsi }}</td>
                                    <td>{{ $berita->nama_berita }}</td>
                                    <td><img src="{{ asset ($berita->gambar) }}" width="100"></td>
                                    <td>

                                        <a href="/berita/{{ $berita->id_berita }}/edit" class="btn btn-success fa fa-edit"></a>
                                        <a href="#" class="btn btn-danger swal-6" data-id="{{ $berita->id_berita }}">
                                                <form action="{{ url('/wisata/'.$berita->id_berita) }}" id="delete{{ $berita->id_berita }}" method="post" class="d-inline">
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
