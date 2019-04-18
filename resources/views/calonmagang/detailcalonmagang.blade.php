@extends('admin')

@section('content')

<h4 class="heading-title mb-1 mt-4 text-secondary">Informasi Calon Magang</h4><br><br>
    <div class="row">
    	 <div class="col-lg-2">
            <div class="card-body text-secondary">Nama</div>
        </div>
        <div class="col col-lg-10">
            <section class="card">
                <div class="card-body heading-title mb-0 mt-1 text-secondary">{{$calonmagang->nama}}
             </div>
            </section>
        </div>
    </div>
    <div class="row">
    	 <div class="col-lg-2">
            <div class="card-body text-secondary">Posisi</div>
        </div>
        <div class="col col-lg-10">
            <section class="card"> 
                <div class="card-body heading-title mb-0 mt-1 text-secondary">{{$calonmagang->posisi->nama_posisi}}</div>
            </section>
        </div>
    </div>
    <div class="row">
    	 <div class="col-lg-2">
            <div class="card-body text-secondary">Status</div>
        </div>
        <div class="col col-lg-10">
            <section class="card"> 
                <div class="card-body heading-title mb-0 mt-1 text-secondary">{{$calonmagang->status}}</div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card-body text-secondary">Waktu Mulai Magang</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->tgl_awal}}</div>
            </section>
        </div>
        <div class="col-lg-3">
                <div class="card-body text-secondary">Batas Akhir Magang</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->tgl_akhir}}</div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
                <div class="card-body text-secondary">Kampus atau Sekolah</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->kampus}}</div>
            </section>
        </div>
        <div class="col-lg-3">
                <div class="card-body text-secondary">Jurusan</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->jurusan}}</div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
                <div class="card-body text-secondary">Telepon</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->telp}}</div>
            </section>
        </div>
        <div class="col-lg-3">
                <div class="card-body text-secondary">Email</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->email}}</div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
                <div class="card-body text-secondary">Instagram</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->instagram}}</div>
            </section>
        </div>
        <div class="col-lg-3">
                <div class="card-body text-secondary">Facebook</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->facebook}}</div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
                <div class="card-body text-secondary">CV</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->cv}}</div>
            </section>
        </div>
        <div class="col-lg-3">
                <div class="card-body text-secondary">Portofolio</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->portofolio}}</div>
            </section>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-3">
                <div class="card-body text-secondary">Alasan Magang di DOT</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->alasan}}</div>
            </section>
        </div>
        <div class="col-lg-3">
                <div class="card-body text-secondary">Alasan Memilih Posisi Magang</div>
        </div>
        <div class="col-lg-3">
            <section class="card">
                <div class="card-body text-secondary">{{$calonmagang->alasan_posisi}}</div>
            </section>
        </div>
    </div>
@endsection
