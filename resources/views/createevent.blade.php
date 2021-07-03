@extends('header')
@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>Input Data Event</h4>
        </div>
        <div class="card-body">
        <form method="POST" action="/event" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
            <div class="col-sm-12 col-md-7">
                <div class="form-select-list">
                <select id="kategori" type="text" class="form-control custom-select-value" name="kategori">
                    <option>-- Pilih Kategori --</option>
                    <option value="Alam">Berita</option>
                    <option value="Buatan">Acara</option>
                </select>
                </div>
            </div>
        </div>
        <div class="form-group row mb-4  @error('judul') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
            <div class="col-sm-12 col-md-7">
            <input name="judul" id="judul" type="text" class="form-control" placeholder="Masukkan Judul" value="{{ old('judul')}}" required>
            @error('judul') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
            <div class="col-sm-12 col-md-7">
            <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi" value="{{ old('deskripsi')}}" required>
            @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('tampil_mulai') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tampil Mulai</label>
            <div class="col-sm-12 col-md-7">
            <input name="tampil_mulai" id="tampil_mulai" type="text" class="form-control datetimepicker" placeholder="Masukkan Tampil Mulai" value="{{ old('tampil_mulai')}}" required>
            @error('tampil_mulai') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4  @error('tampil_selesai') input-with-error @enderror">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tampil Selesai</label>
            <div class="col-sm-12 col-md-7">
            <input name="tampil_selesai" id="tampil_selesai" type="text" class="form-control datetimepicker" placeholder="Masukkan Tampil Selesai" value="{{ old('tampil_selesai')}}" required>
            @error('tampil_selesai') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
            </div>
        </div>
        <div class="form-group row mb-4 @error('gambar') input-with-error @enderror">
            <label for="gambar" class="control-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
            <div>
                <img src="" id="output" width="200px" />
                <input onchange="loadFile(event)" type="file" name="gambar" id="gambar" class="form-control" placeholder="Document File..." value="{{ old('gambar')}}" required>
                @error('gambar') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
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
