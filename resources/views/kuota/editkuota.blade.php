@extends('nyoba')

@section('content')
<div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Edit Kuota</span>
            </div>
        </div>
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
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ url('kuota') }}">
                    <button type="submit" class="btn btn-primary">Back</button>
                </a>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
