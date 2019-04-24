@extends('nyoba')

@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Posisi</span>
            <h3 class="page-title">Detail Posisi</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img class="rounded-circle" src="{{ asset('/storage' .str_replace('public','',$posisi->gambar)) }}" width="110"> 
                    </div>
                    <h4 class="mb-0">{{$posisi->nama_posisi}}</h4>
                    <span class="text-muted d-block mb-2"><b>Tampil = </b>{{$posisi->aksi}}</span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                        <strong class="text-muted d-block mb-2">Deskripsi</strong>
                        <span>{{$posisi->deskripsi}}</span>
                    </li>
                </ul><br>
                <div class="text-center">
                    <a href="{{ url('posisi') }}">
                        <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                            <i class="material-icons mr-1">clear</i>Back</button>
                    </a>
                </div><br>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                <h6 class="m-0">Edit Posisi</h6>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                    <div class="col">
                        <form action="{{route('posisi.update', $posisi->id)}}" enctype="multipart/form-data" method="POST">
                            {{method_field('PATCH')}}
                            @csrf
                            <div class="form-group">
                                <label for="nama_posisi">Nama Posisi</label>
                                <input class="form-control" value="{{$posisi->nama_posisi}}" type="text" name="nama_posisi" placeholder="Nama Posisi">
                            </div>
                                <div class="form-group">
                                <label for="title">Gambar</label><br>
                                    <img src="{{ asset('/storage' .str_replace('public','',$posisi->gambar)) }}" height="300" width="300" align="center" class="img-thumbnail">
                                <input class="form-control" value="{{$posisi->gambar}}" type="file" name="gambar" placeholder="Gambar">
                            <div class="form-group">
                                <label for="content">Deskripsi</label>
                                <textarea class="form-control"  name="deskripsi" id="deskripsi" cols="30" rows="3" placeholder="deskripsi">{{$posisi->deskripsi}}</textarea>
                            </div> 
                                <div class="form-group">
                                <label for="content">Tampilkan di Halaman Pendaftaran</label>
                                    <p>        
                                        @if($posisi->aksi == "true")     
                                            <input type = "radio" name = "aksi"  value = "true" checked="checked"/>
                                                <label>Iya</label>
                                            <input type = "radio" name = "aksi"  value ="false" />
                                                <label>Tidak</label>
                                        @elseif($posisi->aksi == "false")  
                                            <input type = "radio" name = "aksi"  value = "true" />
                                                <label>Iya</label>
                                            <input type = "radio" name = "aksi"  value ="false" checked="checked" />
                                                <label>Tidak</label>
                                        @endif
                                    </p>      
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
	            
