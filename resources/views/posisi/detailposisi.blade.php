@extends('admin')

@section('content')

<h4 class="heading-title mb-1 mt-4 text-secondary">Posisi Posisi Magang</h4><br>
<div class="row">
    <div class="col col-lg-12">
        <section class="card">
        <div class="card-header">Nama Posisi</div>
            <div class="card-body heading-title mb-0 mt-1 text-secondary" align="center">{{$posisi->nama_posisi}}
         	</div>
        </section>
    </div>
</div>
<div class="row">
		<div class="col col-lg-12" align="center">
				<img src="{{ asset('/storage' .str_replace('public','',$posisi->gambar)) }}" height="300" width="300" align="center" class="img-thumbnail">
		</div>
</div><br>
<div class="row">
    <div class="col col-lg-12">
        <section class="card">
        	<div class="card-header">Deskripsi</div>
            <div class="card-body heading-title mb-0 mt-1 text-secondary">{{$posisi->deskripsi}}
         	</div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col col-lg-12">
        <section class="card">
          <div class="card-header">Tampilkan di Pendaftaran</div>
            <div class="card-body heading-title mb-0 mt-1 text-secondary">{{$posisi->aksi}}
          </div>
        </section>
    </div>
</div>
@endsection
	            
