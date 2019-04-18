@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
