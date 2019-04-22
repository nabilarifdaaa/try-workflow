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

{{-- <h4 class="heading-title mb-1 mt-4 text-secondary">Activity Magang</h4><br>
  <div class="row">
      <div class="col col-lg-12">
          <section class="card">
          <div class="card-header">Nama</div>
              <div class="card-body heading-title mb-0 mt-1 text-secondary" align="center">{{$activity->title}}
           	</div>
          </section>
      </div>
  </div>

  <div class="row">
  		<div class="col col-lg-12" align="center">
  				<img src="{{ asset('/storage' .str_replace('public','',$activity->gambar)) }}" height="300" width="300" class="img-thumbnail">
  		</div>
  </div><br> --}}
@endsection
	            
