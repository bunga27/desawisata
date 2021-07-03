@extends('header')
@section('content')
<!-- Vertically Center -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog"
          aria-labelledby="editmodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editmodal">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="POST" id="editform" action="/event/{{ $event->id_event }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="form-group row mb-4  @error('nama_event') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama event</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="nama_event" id="nama_event" type="text" class="form-control" placeholder="Masukkan nama" value="{{ $event->nama_event}}">
                    @error('nama_event') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('deskripsi') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan deskripsi" value="{{ $event->deskripsi}}">
                    @error('deskripsi') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('tampil_mulai') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tampil Mulai</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="tampil_mulai" id="tampil_mulai" type="text" class="form-control datetimepicker" placeholder="Masukkan Tampil Mulai" value="{{ $event->tampil_mulai}}" required>
                    @error('tampil_mulai') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4  @error('tampil_selesai') input-with-error @enderror">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tampil Selesai</label>
                    <div class="col-sm-12 col-md-7">
                    <input name="tampil_selesai" id="tampil_selesai" type="text" class="form-control datetimepicker" placeholder="Masukkan Tampil Selesai" value="{{ $event->tampil_selesai}}" required>
                    @error('tampil_selesai') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                </div>
                <div class="form-group row mb-4 @error('gambar') input-with-error @enderror">
                    <label for="gambar" class="control-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                    <div class="col-sm-12 col-md-7">
                    <div>
                        <img src="{{asset($event->gambar)}}" id="output" width="200px" />
                        <input onchange="loadFile(event)" type="file" name="gambar" id="gambar" class="form-control" placeholder="Document File..." value="{{ $event->gambar}}">
                        @error('gambar') <div class="invalid-feedback alert-danger">{{$message}}</div>@enderror
                    </div>
                    </div>
                </div>

            </form>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
@endsection
