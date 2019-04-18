@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
        </div>
    </div>
</div>
@endsection
