@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('calonmagang.update', $calonmagang->id)}}" enctype="multipart/form-data" method="POST">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" value="{{$calonmagang->nama}}" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <select class="form-control" name="posisi" id="posisi">
                                @foreach($posisis as $posisi)
                                <option value="{{$posisi->id}}"
                                    @if($calonmagang->id_posisi === $posisi->id)
                                        selected
                                    @endif
                                    >{{$posisi->nama_posisi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Kampus</label>
                            <input class="form-control" value="{{$calonmagang->kampus}}" type="text" name="kampus">
                        </div>
                        <div class="form-group">
                            <label for="nama">Jurusan</label>
                            <input class="form-control" value="{{$calonmagang->jurusan}}" type="text" name="jurusan">
                        </div>
                        <div class="form-group">
                            <label for="nama">Telepon</label>
                            <input class="form-control" value="{{$calonmagang->telp}}" type="text" name="telp">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" value="{{$calonmagang->email}}" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="nama">Instagram</label>
                            <input class="form-control" value="{{$calonmagang->instagram}}" type="text" name="instagram">
                        </div>
                        <div class="form-group">
                            <label for="nama">Facebook</label>
                            <input class="form-control" value="{{$calonmagang->facebook}}" type="text" name="facebook">
                        </div>
                        <div class="form-group">
                            <label for="nama">CV</label>
                            <input class="form-control" value="{{$calonmagang->cv}}" type="text" name="cv">
                        </div>
                        <div class="form-group">
                            <label for="nama">Portofolio</label>
                            <input class="form-control" value="{{$calonmagang->portofolio}}" type="text" name="portofolio">
                        </div>
                        <div class="form-group">
                            <label for="nama">Waktu mulai magang</label>
                            <input class="form-control" value="{{$calonmagang->tgl_awal}}" type="date" name="tgl_awal">
                        </div>
                        <div class="form-group">
                            <label for="nama">Batas akhir magang</label>
                            <input class="form-control" value="{{$calonmagang->tgl_akhir}}" type="date" name="tgl_akhir">
                        </div>
                        <div class="form-group">
                            <label for="nama">Alasan</label>
                           <textarea class="form-control"  name="alasan" id="alasan" cols="30" rows="3" placeholder="Alasan">{{$calonmagang->alasan}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama">Alasan Posisi Magang</label>
                           <textarea class="form-control"  name="alasan_posisi" id="alasan_posisi" cols="30" rows="3" placeholder="Alasan">{{$calonmagang->alasan_posisi}}</textarea>
                        </div>
                         <div class="form-group">
                            <label for="infomagang">Info Magang</label>
                            <select class="form-control" name="info" id="infomagang">
                                @foreach($infos as $info)
                                <option value="{{$info->id}}"
                                    @if($calonmagang->id_info === $info->id)
                                        selected
                                    @endif
                                    >{{$info->info}}</option>
                                @endforeach
                            </select>
                        </div>                     
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
