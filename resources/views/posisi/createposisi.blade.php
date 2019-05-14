@extends('nyoba')

@section('content')
<div class="container">
    <div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Tambah Posisi</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('posisi.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama Posisi</label>
                        <input class="form-control"  type="text" name="nama_posisi" value="{{ old('nama_posisi') }}" placeholder="Nama Posisi">
                    </div>
                    <div class="form-group">
                        <label for="title">Gambar</label>
                        <input class="form-control" type="file" name="gambar" placeholder="Gambar">
                    </div>
                    <div class="form-group">
                        <label for="content">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" id="deskripsi" cols="30" rows="3" placeholder="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Tampilkan di Halaman Pendaftaran</label>
                            <p>           
                                <input type = "radio" name = "aksi"  value = "true" checked = "checked" />
                                    <label>Iya</label>
                                <input type = "radio" name = "aksi"  value ="false" />
                                    <label>Tidak</label>
                            </p>      
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
                <a href="{{ url('posisi') }}">
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px; padding: 9px 21px 9px 20px">Back</button>
                </a>
            </div>
        </div>
    </div>
</div>
    
<br>
@endsection
