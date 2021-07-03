@extends('header')
@section('content')
<div class="row">

    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>Input Data Desa Wisata</h4>
        </div>
        <div class="card-body">
        <form method="POST" action="/wisata" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
            <div class="col-sm-12 col-md-7">
                <div class="form-select-list">
                <select id="kategori" type="text" class="form-control custom-select-value" name="kategori">
                    <option>-- Pilih Kategori --</option>
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
        </div>
        <div class="form-group row mb-4  @error('nama_wisata') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Desa/Wisata</label>
            <div class="col-sm-12 col-md-7">
            <input name="nama_wisata" id="nama_wisata" type="text" class="form-control" placeholder="Masukkan nama wisata" value="{{ old('nama_wisata')}}" required>
            @error('nama_wisata') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">deskripsi</label>
            <div class="col-sm-12 col-md-7">
            <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan deskripsi" value="{{ old('deskripsi')}}" required>
            @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('alamat') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
            <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Masukkan Nama Alamat" value="{{ old('alamat')}}">
            @error('alamat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>

        {{-- <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
            <div class="col-sm-12 col-md-7">
                <select class="form-control" id="id_kecamatan" name="id_kecamatan" required>
                    <option value selected="selected">-- Pilih Kecamatan --</option>
                    @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->id_kecamatan }}">{{ $kec->nama_kecamatan }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}

        <div class="form-group row mb-4  @error('alamat') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Maps</label>
            <div class="col-sm-12 col-md-7">
            <input name="maps" id="maps" type="text" class="form-control" placeholder="Masukkan maps" value="{{ old('maps')}}" required>
            @error('maps') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        {{-- <div class="form-group">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" aria-label="">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">Maps</button>
            </div>
            </div>
        </div> --}}
        <div class="form-group row mb-4 @error('koordinat') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinat</label>
            <div class="col-sm-12 col-md-7">
            <div class="input-group mb-3">
            <input name="koordinat" id="koordinat" type="text" class="form-control" placeholder="Masukkan koordinat" value="{{ old('koordinat')}}" required>

            <div>
                <button  class="btn btn-primary" target="_blank" onclick="window.open('https://www.google.co.id/maps/@-7.644258,111.5349059,15z','_blank');" type="button">Maps</button>
            </div>
            <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="">

                  <div class="card-body">
                    <div class="row mb-4">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="input-group">
                          <input type="text" class="form-control" id="input-lat" placeholder="Latitude">
                          <input type="text" class="form-control" id="input-lng" placeholder="Longitude">
                        </div>
                      </div>
                    </div>
                    <div class="alert alert-info">
                      Tentukan titik koordinat dengan lokasi
                    </div>
                    <div id="map" data-height="400"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            @error('koordinat') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
            </div>
        </div>
         <div class="form-group row mb-4  @error('youtube_profil') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube Profil</label>
            <div class="col-sm-12 col-md-7">
            <input name="youtube_profil" id="youtube_profil" type="text" class="form-control" placeholder="Masukkan youtube profil" value="{{ old('youtube_profil')}}" required>
            @error('youtube_profil') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('jam_buka') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Buka</label>
            <div class="col-sm-12 col-md-7">
            <input name="jam_buka" id="jam_buka" type="time" class="form-control" placeholder="Masukkan Jam Buka" value="{{ old('jam_buka')}}" required>
            @error('jam_buka') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('jam_tutup') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jam Tutup</label>
            <div class="col-sm-12 col-md-7">
            <input name="jam_tutup" id="jam_tutup" type="time" class="form-control" placeholder="Masukkan Jam Tutup" value="{{ old('jam_tutup')}}" required>
            @error('jam_tutup') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4 @error('gambar') input-with-error @enderror">
            <label for="gambar2" class="control-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
            <div>
                <img src="" id="output" width="200px" />
                <input multiple type="file" name="gambar2[]" id="gambar2" class="form-control" placeholder="Document File..." value="{{ old('gambar')}}" required>
            </div>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
        </div>
        </form>
    </div>
    </div>
</div>
<script>
var loadFile = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
}

</script>
@endsection
