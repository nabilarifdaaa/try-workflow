@extends('nyoba')

@section('content')
<div class="container">
    <div class="main-content-container container-fluid px-4">
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Tambah Testimoni</span>
                </div>
            </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('testimoni.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama</label>
                        <input class="form-control" type="text" value="{{ old('nama') }}" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <select class="form-control" name="posisi" id="posisi">
                            @foreach($posisis as $posisi)
                            <option value="{{$posisi->id}}">{{$posisi->nama_posisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Gambar</label>
                        <input class="form-control" type="file" name="gambar" placeholder="Gambar">
                    </div>
                    <div class="form-group">
                        <label for="title">Content</label>
                        <input class="form-control" type="text" value="{{ old('content') }}" name="content" placeholder="Content">
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
                <a href="{{ url('testimoni') }}">
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px; padding: 9px 21px 9px 20px">Back</button>
                </a>
            </div>
        </div><br>
    </div>
</div>
    

@endsection
