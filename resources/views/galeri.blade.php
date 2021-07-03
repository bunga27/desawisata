@extends('header')
@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Galeri Wisata {{ $wisata->nama_wisata }}</h4>
            </div>

            <form method="POST" action="/gambar" enctype="multipart/form-data">
                @csrf
                <input id="wisata_id" name="wisata_id" value="{{ $wisata->id_wisata }}" hidden>
                <div class="col-lg-12">
                    <input multiple type="file" name="gambar2[]" id="gambar2" class="form-control" placeholder="Document File..."
                        value="{{ old('gambar')}}" required>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-success pull-right fa fa-plus" type="submit"></button>
                </div>

            </form>
            <div class="card-body">
                <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                    @foreach ($gambar as $gambar)

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{ asset($gambar->gambar2)}}" data-sub-html="Wisata {{ $wisata->nama_wisata }}">
                            <img class="img-responsive thumbnail"
                            src="{{ asset($gambar->gambar2)}}" alt="">
                        </a>
                    </div>
                    <form action="{{ url('/gambar/'.$gambar->id_gambar) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-custom waves-effect waves-light center m-r-5">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>

                    @endforeach
                </div>
                <div>



                    <a class="btn btn-primary pull-right" href='/galeriok' type="button">Simpan</a>
                </div>
            </div>



        </div>
    </div>
</div>

@endsection
