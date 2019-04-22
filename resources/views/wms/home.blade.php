@extends('header')

@section('content')
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                
              </div>
            </div>
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Posts</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Posts</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Posts</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Posts</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Default Light Table -->
             <div class="row">
                <div class="col">
                  <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Active Users</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                      <table class="table mb-0">
                        <thead class="bg-light">
                          <tr>
                            <th scope="col" class="border-0">Id</th>
                            <th scope="col" class="border-0">Nama</th>
                            <th scope="col" class="border-0">Posisi</th>
                            <th scope="col" class="border-0">Status</th>
                            <th scope="col" class="border-0">Flow</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($state as $user)    
                            <tr>
                              <td>{{$user->user_id}}</td>
                              <td>{{$user->nama}}</td>
                              <td>{{$user->nama_posisi}}</td>
                              <td><p class="badge badge-pill badge-success">{{$user->state}}</p></td>
                              <td><select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>flow 1</option>
                                  <option>flow 2</option>
                                  <option>flow 3</option>
                                  <option>flow 4</option>
                                </select></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Default Light Table -->
          </div>
@endsection
          