@extends('admin')

@section('content')

<h4 class="heading-title mb-1 mt-4 text-secondary">Testimoni Magang</h4><br>
<div class="row">
    <div class="col col-lg-12">
        <section class="card">
        <div class="card-header">Nama</div>
            <div class="card-body heading-title mb-0 mt-1 text-secondary" align="center">{{$testimoni->nama}}
         	</div>
        </section>
    </div>
</div>
<div class="row">
		<div class="col col-lg-12" align="center">
				<img src="{{ asset('/storage' .str_replace('public','',$testimoni->gambar)) }}" height="300" width="300" class="img-thumbnail">
		</div>
</div><br>
<div class="row">
    <div class="col col-lg-12">
        <section class="card">
        	<div class="card-header">Deskripsi</div>
            <div class="card-body heading-title mb-0 mt-1 text-secondary">{{$testimoni->posisi->nama_posisi}}
         	</div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col col-lg-12">
        <section class="card">
          <div class="card-header">Content</div>
            <div class="card-body heading-title mb-0 mt-1 text-secondary">{{$testimoni->content}}
          </div>
        </section>
    </div>
</div>

@endsection
	            
