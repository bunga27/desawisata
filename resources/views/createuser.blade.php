@extends('header')
@section('content')
@if (auth()->user()->level=="super")
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Input Data Admin</h4>
                </div>
                <div class="card-body">
                <form action="{{url('/dataadmin')}}" method="post">
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="form-select-list">
                            <select id="level" type="text" class="form-control custom-select-value" name="level">
                                <option>-- Pilih Level Admin --</option>
                                <option value="super">Super Admin</option>
                                <option value="admin">Admin</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Masukan nama" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Masukan email" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
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
@endif
{{-- <script type="text/javascript">
    function setInput(result) {
        var value = result.value;

        $.ajax({
            url: '{{ url('/keluarga/get-data/') }}',
            type: 'post',
            data: '_token={{ csrf_token() }}&id=' + value,
            dataType: 'JSON',
            success: function(response){
                document.getElementById('nama').value = response.result.nama;
            }
        })
    }
</script> --}}

@endsection
