@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('activity.update', $activity->id)}}" enctype="multipart/form-data" method="POST">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input class="form-control" value="{{$activity->title}}" type="text" name="title" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="title">Gambar</label><br>
                             <img src="{{ asset('/storage' .str_replace('public','',$activity->gambar)) }}" height="300" width="300" class="img-thumbnail">
                            <input class="form-control"  type="file" name="gambar" placeholder="Gambar">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
