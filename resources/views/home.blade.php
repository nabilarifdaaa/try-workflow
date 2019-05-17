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
            <p>Hello Admin!</p>
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
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Calon Magang</span>
                  <h6 class="stats-small__value count my-3">{{$count_regis}}</h6>
                </div>
                <div class="stats-small__data">
                  <span class="badge badge-pill badge-secondary">Registered</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-1"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Calon Magang</span>
                  <h6 class="stats-small__value count my-3">{{$count_review}}</h6>
                </div>
                <div class="stats-small__data">
                  <span class="badge badge-pill badge-secondary">Review CV</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-3"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Calon Magang</span>
                  <h6 class="stats-small__value count my-3">{{$count_tes}}</h6>
                </div>
                <div class="stats-small__data">
                  <span class="badge badge-pill badge-secondary">Tes Teknis</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-3"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Calon Magang</span>
                  <h6 class="stats-small__value count my-3">{{$count_interview}}</h6>
                </div>
                <div class="stats-small__data">
                  <span class="badge badge-pill badge-secondary">Wawancara</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-3"></canvas>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Calon Magang</span>
                  <h6 class="stats-small__value count my-3">{{$count_acc}}</h6>
                </div>
                <div class="stats-small__data">
                  <span class="badge badge-pill badge-success">Accepted</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-2"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
          <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
              <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                  <span class="stats-small__label text-uppercase">Calon Magang</span>
                  <h6 class="stats-small__value count my-3">{{$count_reject}}</h6>
                </div>
                <div class="stats-small__data">
                  <span class="badge badge-pill badge-danger">Rejected</span>
                </div>
              </div>
              <canvas height="120" class="blog-overview-stats-small-3"></canvas>
            </div>
          </div>
        </div>
    </div>
@endsection
