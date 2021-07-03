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
                    <h4>Ulasan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="idulasan">NO</th>
                            <th class="nama_wisata">Nama Wisata</th>
                            <th class="namapenulis">Nama</th>
                            <th class="ulasan">Ulasan</th>
                            <th class="nilai">Nilai</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach( $ulasan as $ulasan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ulasan->wisata->nama_wisata}}</td>
                                    <td>{{ $ulasan->nama_penulis }}</td>
                                    <td>{{ $ulasan->ulasan }}</td>
                                    <td>{{ $ulasan->nilai}}</td>
                                    <td>

                                       <a href="#" class="btn btn-danger swal-6" data-id="{{ $ulasan->id_ulasan }}">
                                                <form action="{{ url('/wisata/'.$ulasan->id_ulasan) }}" id="delete{{ $ulasan->id_ulasan }}" method="post" class="d-inline">
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
