@extends('nyoba')

@section('content')
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Calon Magang</span>
    </div>
</div>
<!-- End Page Header -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Detail Calon Magang</h6>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
            <div class="row">
                <div class="col">
                    <form>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="feFirstName">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{$calonmagang->nama}}" disabled> 
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feFirstName">Asal Sekolah/Kampus</label>
                            <input type="text" class="form-control" value="{{$calonmagang->kampus}}" disabled> 
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feLastName">Jurusan</label>
                            <input type="text" class="form-control" value="{{$calonmagang->jurusan}}" disabled> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="feLastName">Posisi Magang</label>
                            <input type="text" class="form-control" value="{{$calonmagang->posisi->nama_posisi}}" disabled> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="feLastName">Nomer Telfon</label>
                            <input type="text" class="form-control" value="{{$calonmagang->telp}}" disabled> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="feFirstName">Tanggal Mulai</label>
                            <input type="text" class="form-control" value="{{$calonmagang->tgl_awal}}" disabled> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="feLastName">Tanggal Berakhir</label>
                            <input type="text" class="form-control" value="{{$calonmagang->tgl_akhir}}" disabled> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="feFirstName">Email</label>
                            <input type="text" class="form-control" value="{{$calonmagang->email}}" disabled> 
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feLastName">Instagram</label>
                            <input type="text" class="form-control" value="{{$calonmagang->instagram}}" disabled> 
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feLastName">Facebook</label>
                            <input type="text" class="form-control" value="{{$calonmagang->facebook}}" disabled> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="feEmailAddress">CV</label>
                            <input type="textarea" class="form-control" value="{{$calonmagang->cv}}" disabled> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="text">Portofolio</label>
                            <input type="text" class="form-control" value="{{$calonmagang->portofolio}}" disabled> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="feEmailAddress">Status</label>
                            <input type="text" class="form-control" value="{{$calonmagang->status}}" disabled> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="text">Flow</label>
                            <input type="text" class="form-control" value="{{$calonmagang->flow}}" disabled> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="feInputAddress">Alasan Magang di DOT</label>
                        <textarea class="form-control" disabled>{{$calonmagang->alasan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="feInputAddress">Alasan Memilih Posisi {{$calonmagang->posisi->nama_posisi}}</label>
                        <textarea class="form-control" disabled>{{$calonmagang->alasan_posisi}}</textarea>
                    </div>
                    <div class="text-center">
                        <a href="{{ url('calonmagang') }}">
                            <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                                <i class="material-icons mr-1">clear</i>Back</button>
                        </a>
                    </div>
                    </form>
                </div>
                </div>
            </li>
            </ul>
        </div>
    </div>
</div>

@endsection
