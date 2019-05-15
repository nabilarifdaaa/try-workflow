@extends('nyoba')

@section('content')
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <i class="fa fa-check mx-2"></i>
          <strong>Success!</strong> Now You Logged in </div>
      </div>
    </div><br>
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3 text-center">
          <div class="card-header border-bottom text-center">
            <div class="mb-3 mx-auto">
              <img class="rounded-circle" src="{{asset('frontend/images/teamwork.png')}}  " alt="User Avatar" width="110"> </div>
            <h4 class="mb-0">{{$admin->name}}</h4>
            <span class="text-muted d-block mb-2">{{$admin->email}}</span>
            {{-- <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
              <i class="material-icons mr-1">person_add</i>Follow</button> --}}
          </div>
          
        </div>
      </div>
    </div>
@endsection
