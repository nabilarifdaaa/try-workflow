@extends('nyoba')

@section('content')
<div class="container">
    <div class="main-content-container container-fluid px-4">
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Create Activities</span>
                </div>
            </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('activity.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="title">Gambar</label>
                        <input class="form-control" type="file" name="gambar" placeholder="Gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
