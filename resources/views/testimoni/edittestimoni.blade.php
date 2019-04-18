@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
        </div>
    </div>
</div>
@endsection
