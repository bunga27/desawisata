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
                    <h4>Wisata</h4>
                  </div>
                  <div style="text-align:right; margin-right:10px">
                         <a href="/wisata/create" class="btn btn-success fa fa-plus"></a>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="id_wisata">No</th>
                            <th class="kategori">Kategori</th>
                            <th class="nama_wisata">Nama Wisata</th>
                            <th class="deskripsi">Diskripsi</th>
                            <th class="jam_buka">Jam Buka</th>
                            <th class="jam_tutup">Jam Tutup</th>
                            {{-- <th class="maps">Maps</th>
                            <th class="koordinat">Koordinat</th>
                            <th class="youtubeprofil">Youtube Profil</th> --}}
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $wisata as $wisata)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $wisata->kategori }}</td>
                                    <td>{{ $wisata->nama_wisata }}</td>
                                    <td>{{ $wisata->deskripsi }}</td>
                                    <td>{{ $wisata->jam_buka }}</td>
                                    <td>{{ $wisata->jam_tutup }}</td>
                                    {{-- <td>{{ $datadesa->maps }}</td>
                                    <td>{{ $datadesa->koordinat }}</td>
                                    <td>{{ $datadesa->youtubeprofil }}</td> --}}
                                    <td>

                                        <a href="/wisata/{{ $wisata->id_wisata }}/edit" class="btn btn-success fa fa-edit"></a>
                                        <a href="/wisata/{{ $wisata->id_wisata }}/galeri" class="btn btn-primary fa fa-image"></a>
                                        <a href="#" class="btn btn-danger swal-6" data-id="{{ $wisata->id_wisata }}">
                                                <form action="{{ url('/wisata/'.$wisata->id_wisata) }}" id="delete{{ $wisata->id_wisata }}" method="post" class="d-inline">
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
