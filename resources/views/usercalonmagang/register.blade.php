@extends('usercalonmagang.app')

@section('content')
<div class="container">
    <h2 class="font-rubik subheading"><span>Register</span></h2>
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('register.store')}}" method="POST" >
                @csrf
                    <div class="form-row">
                     <input class="form-control" value="{{$posisi->id}}" type="hidden" name="id_posisi" placeholder="Nama" required>
                        <div class="form-group col-md-6 form-style">
                            <input type="text" class="form-control" value="{{ old('kampus') }}" name="kampus" placeholder="Nama Kampus" required>
                            <p class="label label-warning" style="display: none">*Harus diisi</p>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{ old('jurusan') }}" name="jurusan" placeholder="Jurusan" required>
                            <p class="label label-warning" style="display: none">*Harus diisi</p>
                        </div>
                    </div>   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{ old('nama') }}" name="nama" placeholder="Nama Lengkap" required>
                            <p class="label label-warning" style="display: none">*Harus diisi</p>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{ old('telp') }}" name="telp" placeholder="No Whatsapp" required>
                            <p class="label label-warning" style="display: none">*Harus diisi</p>
                        </div>
                    </div>   
                       <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email" required>
                        </div>
                    </div>   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{ old('facebook') }}" name="facebook" placeholder="Akun Facebook" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{ old('instagram') }}" name="instagram" placeholder="Akun Instagram" required>
                        </div>
                    </div>      
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl_awal" class="label-register">Mulai Magang</label>
                            <input type="date"  class="form-control" onchange="calculateDate()" value="{{ old('tgl_awal') }}" id="date_start" name="tgl_awal" placeholder="Tanggal Mulai" required>
                            <p class="label label-warning-date" style="display: none">*Durasi Magang minimal 3 bulan</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_awal" class="label-register">Berakhir Magang</label>
                            <input type="date" id="date_end" class="form-control" onchange="calculateDate()" value="{{ old('tgl_akhir') }}" name="tgl_akhir" placeholder="Tanggal Berakhir" required>
                        </div>
                    </div>   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{ old('cv') }}" name="cv" placeholder="Link CV" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" value="{{ old('portofolio') }}" name="portofolio" placeholder="Link Portofolio" required>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea  name="alasan_posisi" cols="61" rows="5" placeholder="Alasan Memilih Posisi Magang" required>{{ old('alasan_posisi') }}</textarea>
                            <p class="label label-warning" style="display: none">*Alasan minimal 20 karakter</p>
                        </div>
                    </div>  
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea  name="alasan" cols="61" rows="5"  placeholder="Alasan Magang di DOT" required>{{ old('alasan') }}</textarea>
                            <p class="label label-warning" style="display: none">*Alasan minimal 20 karakter</p>
                        </div>
                    </div> 
                    <p>Mengetahui DOT dari: </p> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        @foreach($infos as $info)
                            <label class="radio--style">{{$info->info}}
                                <input type="radio" value="{{$info->id}}" checked="checked" name="id_info">
                                <span class="checkmark"></span>
                            </label> 
                        @endforeach
                        </div>
                    </div> 
                    <button type="submit" id="btn_submit" class="btn btn-success btn-lg round btn--size" style="wnameth: 147px; height: 38px;">Register</button>
                    <a href="{{url('/position-detail',$posisi->id)}}" class="menu--item btn btn-success btn-lg round outline btn--size" style="wnameth: 147px; height: 38px;">Back</a>
                </form>
            </div>
            <div class="col-lg-6">
                <h3 class="register--subtitle">{{ $posisi->nama_posisi }}</h3>
                <img class="register--img" src="{{asset('frontend/images/3.svg')}}" alt="">
            </div>
        </div>
        <footer>
            <div class="row">
                <div class="col-lg-5">
                    <p style="color: #1E2739;">2019 All rights reserved. PT. Digdaya Olah Teknologi Indonesia</p>
                </div>
                <div class="col-lg-7">
                    <ul class="social_footer_ul">
                        <li><a class="dark" href="https://www.linkedin.com/company/dot-indonesia/"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="dark" href="https://medium.com/dot-lab"><i class="fa fa-medium"></i></a></li>
                        <li><a class="dark" href="https://www.instagram.com/dot.indonesia/"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="dark" href="https://www.facebook.com/dotindonesia/"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="dark" href="https://dribbble.com/dot_indonesia"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
        </div>
@endsection
@push('scripts')
    <script>
        function calculateDate() {
            var date1 = new Date($('#date_start').val())
            var date2 = new Date($('#date_end').val())

            date1.setDate(date1.getDate() + 90) //AfterThreeMonths
            if(isNaN(date2) != true){
                console.log("date1", new Date(date1).getTime())
                console.log("date2", new Date(date2).getTime())
                if((new Date(date1).getTime() <= new Date(date2).getTime()) == true){
                    $('.label-warning-date').hide()
                    document.getElementById("btn_submit").disabled = false;
                } else {
                    $('.label-warning-date').show()
                    document.getElementById("btn_submit").disabled = true;
                }
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            var form = $('#register-form');
            form.submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url     : form.attr('action'),
                    type    : form.attr('method'),
                    data    : form.serialize(),
                    dataType: 'json',
                    success : function ( json )
                    {
                        console.log("success");
                    },
                    error: function( json )
                    {
                        if(json.status === 422) {
                            // var errors = json.responseJSON;
                            // $.each(json.responseJSON, function (key, value) {
                            //     $('.'+key+'-error').html(value);
                            // });
                            // console.log(json.responseJSON);
                            alert(json.responseJSON.message);
                        }
                        // else if(json.status === 500){
                        //     console.log("500");
                        // }
                        else {
                            // console.log("berhasil");
                            window.location.href = '{{ url("usercalonmagang/success") }}';
                        } 

                    }
                });
            });
        });
    </script>
@endpush