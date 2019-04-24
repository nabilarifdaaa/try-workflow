@extends('nyoba')

@section('content')
<div class="container">
    <div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Edit Info Magang</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('infomagang.update', $infomagang->id)}}" method="POST">
                    {{method_field('PATCH')}}
                    @csrf
                    <div class="form-group">
                        <label for="nama_infomagang">Info</label>
                        <input class="form-control" value="{{$infomagang->info}}" type="text" name="info">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
