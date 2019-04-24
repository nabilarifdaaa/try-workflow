@extends('nyoba')

@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Testimoni</span>
            <h3 class="page-title">Detail Testimoni</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img class="rounded-circle" src="{{ asset('/storage' .str_replace('public','',$testimoni->gambar)) }}" width="110"> 
                    </div>
                    <h4 class="mb-0">{{$testimoni->nama}}</h4>
                    <span class="text-muted d-block mb-2">{{$testimoni->posisi->nama_posisi}}</span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                        <strong class="text-muted d-block mb-2">Testimoni</strong>
                        <span>{{$testimoni->content}}</span>
                    </li>
                </ul><br>
                <div class="text-center">
                    <a href="{{ url('testimoni') }}">
                        <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                            <i class="material-icons mr-1">clear</i>Kembali</button>
                    </a>
                </div><br>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                <h6 class="m-0">Edit Testimoni</h6>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                    <div class="col">
                        <form action="{{route('testimoni.update', $testimoni->id)}}" enctype="multipart/form-data" method="POST">
                            {{method_field('PATCH')}}
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" value="{{$testimoni->nama}}" type="text" name="nama" placeholder="Nama">
                            </div>
                                <div class="form-group">
                                <label for="title">Gambar</label><br>
                                    <img src="{{ asset('/storage' .str_replace('public','',$testimoni->gambar)) }}" height="300" width="300" class="img-thumbnail">
                                <input class="form-control"  type="file" name="gambar" placeholder="Gambar">
                            </div>
                            <div class="form-group">
                                <label for="posisi">Posisi</label>
                                <select class="form-control" name="posisi" id="posisi">
                                    @foreach($posisis as $posisi)
                                    <option value="{{$posisi->id}}"
                                        @if($testimoni->id_posisi === $posisi->id)
                                            selected
                                        @endif
                                        >{{$posisi->nama_posisi}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control"  name="content" id="content" cols="30" rows="3" placeholder="Content">{{$testimoni->content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
	            
