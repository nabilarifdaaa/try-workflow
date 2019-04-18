@extends('admin1')

@section('content')

<body class="body-login">
    <div class="login--style">
        <div class="login-bg">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{asset('frontend/images/admin.svg')}}" alt="" class="login-img">
                </div>
                <div class="col-lg-4">
                    <img src="{{asset('frontend/images/logo.png')}}" alt="" class="login-logo">
                    <h4 class="login-title">Internship</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-10 form-style login-form">
                                <input id="email" type="text" class="form-control center{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-row">
                            <div class="form-group col-md-10 form-style login-form">
                               <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10 form-style login-form">
                             <button type="submit" class="btn btn-success btn-lg round" style="width: 100%; margin-top: 15px;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


</body>

@push("scripts")
@endpush