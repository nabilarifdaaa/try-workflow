@extends('admin')

@section('content')

<h4 class="heading-title mb-1 mt-4 text-secondary">Activity Magang</h4><br>
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
  </div><br>
@endsection
	            
