@extends('usercalonmagang.app')

@section('content')
<div class="container">
    <img class="success--img" src="{{asset('frontend/images/success.svg')}}" alt="success" width="195.37" height="205.02">
        <h1 class="success--title font-rubik" style="font-weight: bold;">Terimakasih Telah Mendaftar</h1>
        <h2 class="success--title font-rubik" style="font-size: 28px;">sebagai Calon Magang di DOT</h2>
        <h4 class="success--subtitle font-rubik">Informasi Selanjutnya akan diinformasikan melalui Email</h4>
<a class="btn btn-success btn-lg round success--btn" href="{{url('/')}}" role="button">Home</a>
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