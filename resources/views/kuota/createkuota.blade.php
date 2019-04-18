@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
</div>
@endsection
