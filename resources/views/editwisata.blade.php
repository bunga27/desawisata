@extends('header')
@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>Edit Data Desa Wisata</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/wisata/{{ $wisata->id_wisata }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                            <div class="col-sm-12 col-md-7">
                                <select id="kategori" type="text" class="form-control custom-select-value" name="kategori"> <option value="{{ $wisata->kategori}}"> {{ $wisata->kategori }}</option>
                                    <option value="Alam">Alam</option>
                                    <option value="Buatan">Buatan</option>
                                    <option value="Desa">Desa</option>
                                    <option value="Sejarah">Sejarah</option>
                                    <option value="Religi">Religi</option>
                                    <option value="Budaya">Budaya</option>
                                    <option value="Ruang Terbuka">Ruang Terbuka</option>
                                </select>
                            </div>
                        </div>
                <div class="form-group row mb-4  @error('nama_wisata') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Wisata</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="nama_wisata" id="nama_wisata" type="text" class="form-control" placeholder="Masukkan Nama Wisata" value="{{ $wisata->nama_wisata}}">
                    @error('nama_wisata') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi" value="{{ $wisata->deskripsi}}">
                    @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('alamat') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Masukkan Nama Alamat" value="{{ $wisata->alamat}}">
                    @error('alamat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                    <div class="form-group row mb-4  @error('koordinat') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinat</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="koordinat" id="koordinat" type="text" class="form-control" placeholder="Masukkan Koordinat" value="{{ $wisata->koordinat}}">
                    @error('koordinat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('youtube_profil') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube Profil</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="youtube_profil" id="youtube_profil" type="text" class="form-control" placeholder="Masukkan Youtube Profil" value="{{ $wisata->youtube_profil}}">
                    @error('youtube_profil') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('maps') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Maps</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="maps" id="jam_tutup" type="text" class="form-control" placeholder="Masukkan Maps" value="{{ $wisata->maps}}">
                    @error('maps') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('jam_buka') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Buka</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="jam_buka" id="jam_buka" type="time" class="form-control" placeholder="Masukkan Jam Buka" value="{{ $wisata->jam_buka}}">
                    @error('jam_buka') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('jam_tutup') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Tutup</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="jam_tutup" id="jam_tutup" type="time" class="form-control" placeholder="Masukkan Jam Tutup" value="{{ $wisata->jam_tutup}}">
                    @error('jam_tutup') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary pull-right" type="submit">SIMPAN</button>
                    </div>
                </div>
                </form>
{{-- BATAS --}}

                {{-- <table class="table col-lg-6 center">
                    <thead>
                        <form method="POST" action="/gambar" enctype="multipart/form-data">
                            @csrf
                            <input id="wisata_id" name="wisata_id" value="{{ $wisata->id_wisata }}" hidden>
                            <div class="col-md-9">
                                <input multiple type="file" name="gambar2[]" id="gambar2" class="form-control"
                                    placeholder="Document File..." value="{{ old('gambar')}}" required>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-defautl d-inline fa fa-plus" type="submit"></button>
                            </div>

                        </form>
                        <tr>
                            <th scope="col">Gambar</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $gambar as $g)
                        <tr>
                                <td>
                                    <img src="{{ asset($g->gambar2) }}" id="output" width="200px" /></td>
                                <td>
                                    <form action="{{ url('/gambar/'.$g->id_gambar) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-custom waves-effect waves-light center m-r-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endforeach

                        </tr>
                    </tbody>
                </table> --}}






        </div>
    </div>
    </div>
</div>

@endsection
