@extends('nyoba')

@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Flow</span>
            <h3 class="page-title">List Flow </h3>
        </div>
    </div>
    <div class="row">
        @foreach ($all as $key=>$value)
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card card-small card-post card-post--aside card-post--1">
                <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-fiord-blue">{{$flowName[$key]}}</a>
                        </h5> 
                        @foreach($value['states'] as $key1=>$value1)
                        <p class="card-text d-inline-block mb-3">{{$key1}} 
                                @if ($key1==="rejected")
                                <i class="material-icons" style="color: red;">cancel</i>
                                @elseif($key1==="accepted")
                                <i class="material-icons" style="color: green;">check_circle</i>
                                @else
                                <i class="material-icons">trending_flat</i>
                                @endif
                            </p>
                        @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div> 
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <a href="{{ url('calonmagang') }}">
                    <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                        <i class="material-icons mr-1">clear</i>Back
                    </button>
                </a>
            </div>
        </div>
    </div> 
@endsection