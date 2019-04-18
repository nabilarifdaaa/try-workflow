@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('kuota.update', $kuota->id)}}" method="POST">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input class="form-control" value="{{$kuota->waktu}}" type="date" name="waktu">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input class="form-control" value="{{$kuota->jumlah}}" type="text" name="jumlah">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
