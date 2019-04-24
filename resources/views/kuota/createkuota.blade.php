@extends('nyoba')

@section('content')
<div class="container">
    <div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Tambah Kuota</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('kuota.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Waktu</label>
                        <input class="form-control" value="{{ old('waktu') }}" type="date" name="waktu" placeholder="Waktu">
                    </div>
                    <div class="form-group">
                        <label for="title">Jumlah</label>
                        <input class="form-control" type="text" value="{{ old('jumlah') }}" name="jumlah" placeholder="Jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
