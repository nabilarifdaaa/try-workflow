@extends('nyoba')

@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Aktivitas</span>
            <h3 class="page-title">Detail Aktivitas</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img class="rounded-circle" src="{{ asset('/storage' .str_replace('public','',$activity->gambar)) }}" width="110"> 
                    </div>
                    <h4 class="mb-0">{{$activity->title}}</h4><br>
                    <a href="{{ url('activity') }}">
                        <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                            <i class="material-icons mr-1">clear</i>Back</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                <h6 class="m-0">Edit Aktivitas</h6>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                    <div class="col">
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
                            <button type="submit" class="btn btn-accent">Update</button>
                        </form>
                    </div>
                    </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
	            
