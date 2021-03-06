@extends('nyoba')

@section('content')
<div class="container">
    <div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Tambah Calon Magang</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('calonmagang.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" required value="{{ old('nama') }}" type="text" name="nama">
                    </div>
                        <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <select class="form-control" name="id_posisi" id="posisi">
                            @foreach($posisis as $posisi)
                            <option value="{{$posisi->id}}">{{$posisi->nama_posisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Kampus</label>
                        <input class="form-control" required  value="{{old('kampus')}}" type="text" name="kampus">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jurusan</label>
                        <input class="form-control" required  value="{{ old('jurusan') }}" type="text" name="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="nama">Telepon</label>
                        <input class="form-control" required  value="{{ old('telp') }}" type="text" name="telp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" required  value="{{ old('email') }}" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="nama">Instagram</label>
                        <input class="form-control" required  value="{{ old('instagram') }}" type="text" name="instagram">
                    </div>
                    <div class="form-group">
                        <label for="nama">Facebook</label>
                        <input class="form-control" required  value="{{ old('facebook') }}" type="text" name="facebook">
                    </div>
                    <div class="form-group">
                        <label for="nama">CV</label>
                        <input class="form-control" required  value="{{ old('cv') }}" type="text" name="cv">
                    </div>
                    <div class="form-group">
                        <label for="nama">Portofolio</label>
                        <input class="form-control" required  value="{{ old('portofolio') }}" type="text" name="portofolio">
                    </div>
                    <div class="form-group">
                        <label for="nama">Waktu mulai magang</label>
                        <input class="form-control"  required value="{{ old('tgl_awal') }}" type="date" name="tgl_awal">
                    </div>
                    <div class="form-group">
                        <label for="nama">Batas akhir magang</label>
                        <input class="form-control" required  value="{{ old('tgl_akhir') }}" type="date" name="tgl_akhir">
                    </div>
                    <div class="form-group">
                        <label for="nama">Alasan</label>
                        <textarea class="form-control" required  name="alasan" id="alasan" cols="30" rows="3" placeholder="Alasan">{{ old('alasan') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alasan Posisi Magang</label>
                        <textarea class="form-control" required  name="alasan_posisi" id="alasan_posisi" cols="30" rows="3" placeholder="Alasan">{{ old('alasan_posisi') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="infomagang">Info Magang</label>
                        <select class="form-control" name="id_info" id="infomagang">
                            @foreach($infos as $info)
                            <option value="{{$info->id}}"
                                >{{$info->info}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
                <a href="{{ url('calonmagang') }}">
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px; padding: 9px 21px 9px 20px">Back</button>
                </a>
            </div>
        </div><br>
    </div>
</div>
@endsection
