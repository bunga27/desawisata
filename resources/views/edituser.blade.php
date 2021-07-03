@extends('header')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Data User</h4>
                </div>
                <div class="card-body">
                <form action="{{url('/dataadmin/'.$users->id)}}" method="post">
                    @csrf
                    @method('patch')
                    {{-- <input type="hidden" name="id" id="id"> --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
                            <div class="col-sm-12 col-md-7">
                                <select id="level" type="text" class="form-control custom-select-value" name="level"> <option value="{{ $users->level}}"> {{ $users->level }}</option>
                                    <option value="super">Super Admin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="nama" value="{{ $users->name }}"required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ $users->email }}"required>
                            </div>
                        </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ganti Password</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Silahkan diisi untuk mengganti password" value="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection
