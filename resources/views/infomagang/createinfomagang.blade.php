@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('infomagang.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Informasi</label>
                            <input class="form-control" type="text" value="{{ old('info') }}" name="info" placeholder="Informasi Magang DOT">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
