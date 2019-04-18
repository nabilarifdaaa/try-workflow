@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
