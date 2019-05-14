@extends('usercalonmagang.app')

@section('content')
    <div class="container">
        <div class="row detail--desc">
            <div class="col-lg-6">
                <img src="{{asset('frontend/images/detail.svg')}}" alt="detail position" width="505.08" height="336">
            </div>
            <div class="col-lg-5">
                <h2>{{ $posisi->nama_posisi }}</h2>
                <h3 class="font-rubik">Requirement :</h3>
                <ul>
                    <li>{{ $posisi->deskripsi}}</li>
                </ul>
                <a class="btn btn-success btn-lg round btn--size" href="{{ route('formregister.user', $posisi->id) }}" role="button">Register</a>
                <a href="{{ route('user') }}" class="menu--item btn btn-success btn-lg round outline btn--size">Back</a>
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