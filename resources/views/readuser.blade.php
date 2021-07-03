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

@if (auth()->user()->level=="super")

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Data Admin</h4>
                    </div>
                    <div style="text-align:right; margin-right:10px">
                        <a href="/dataadmin/create" class="btn btn-success fa fa-plus"></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="" style="width:100%;">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Level</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $users)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $users->level }}</td>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                           {{-- <a href="{{ url('user/'.$users->id) }}" class="on-default edit-row btn btn-warning" ><i class="far fa-eye"></i></a> --}}
                                            {{-- <a href="{{ url('/datauser/'.$users->id.'/edit') }}" class="on-default edit-row btn btn-primary" ><i class="fa fa-edit"></i></a> --}}
                                            {{-- <form action="{{ url('/datauser/'.$users->id) }}" method="post" class="d-inline">
                                            </form>
                                            <a href="#" class="btn btn-danger swal-6" data-id="{{ $users->id }}">
                                                <form action="{{url('/datauser/'.$users->id) }}" id="delete{{ $users->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                                <i class="fa fa-trash"></i>
                                            </a> --}}
                                            <a href="/dataadmin/{{ $users->id }}/edit" class="btn btn-success fa fa-edit"></a>
                                            <a href="#" class="btn btn-danger swal-6" data-id="{{ $users->id }}">
                                                <form action="{{ url('/dataadmin/'.$users->id) }}" id="delete{{ $users->id }}" method="post" class="d-inline">
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
    </div>
</section>
@endif

@endsection
