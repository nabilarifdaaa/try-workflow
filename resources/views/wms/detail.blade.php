@extends('nyoba')

@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Flow</span>
            <h3 class="page-title">Setting State</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">List State : {{$user->flow}}</h6>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-small list-group-flush">
                        @foreach($flow['states'] as $key=>$value)
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">{{$key}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12">
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Detail Calon Magang</h6>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-small list-group-flush">
                        <li class="list-group-item d-flex px-3">
                            <strong>Nama : &nbsp</strong>
                            <span class="text-semibold text-fiord-blue">{{$user->nama}}</span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <strong>Sekolah/Kampus : &nbsp</strong>
                            <span class="text-semibold text-fiord-blue">{{$user->kampus}}</span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <strong>Jurusan : &nbsp</strong>
                            <span class="text-semibold text-fiord-blue">{{$user->jurusan}}</span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <strong>Posisi : &nbsp</strong>
                            <span class="text-semibold text-fiord-blue">{{$user->nama_posisi}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 ">
            <div class="card card-small blog-comments">
            <!-- Post Overview -->
                <div class="card-header border-bottom">
                    <h6 class="m-0">Setting State</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                            <div class="blog-comments__actions">
                                <i class="material-icons mr-1">flag</i>
                                    <strong class="mr-1">Current State:</strong> 
                                    <p  class="card-post__category badge badge-pill badge-success">{{$user->state}}</p>
                                    @if ($user->state === "accepted" || $user->state === "rejected" )
                                        <div class="btn-group btn-group-sm" style="margin-left: 60px;">
                                    @else
                                        <form action="{{route("wms.action", ["id" => $user->id])}}" method="post" onsubmit="return confirm('Are you sure approved this state?');">
                                            {{ csrf_field() }}
                                            <input name="id" value="{{$user->id}}" type="hidden">
                                            <input name="flow" value="{{$user->flow}}" type="hidden">
                                            <input name="state" value="{{$user->state}}" type="hidden">
                                            <button type="submit" class="btn btn-white" name="action" value="approve">
                                                <span class="text-success">
                                                    <i class="material-icons">check</i>
                                                </span> Approve 
                                            </button>
                                            <button type="submit" class="btn btn-white" name="action" value="reject">
                                                <span class="text-danger">
                                                    <i class="material-icons">clear</i>
                                                </span> Reject 
                                            </button>
                                        </form>
                                    @endif
                                        </div>
                            </div>
                        </span>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">History</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                            <th scope="col" class="border-0">Passed State</th>
                            <th scope="col" class="border-0">Status</th>
                            <th scope="col" class="border-0">Time</th>
                            <th scope="col" class="border-0">Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $h)
                                <tr>
                                    <td>{{$h->passed_state}}</td>
                                    <td>{{$h->status}}</td>
                                    <td>{{$h->created_at}}</td>
                                    <td>{{$h->name}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

@push("scripts")
    <script type="text/javascript">
        function approved(element){
            var id = $(element).attr("data-id");
            var confirm = window.confirm("Are you sure approved this state?");

            if(confirm) {
                $.ajax({  
                    url: "{{ url('/condition') }}" + "/" + id + "/approved",
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(result) {
                        window.location.href= "{{url('/wms.detail')}}";
                    },
                    fail: function(error) {
                        alert("Error");
                        console.log(error);
                    } 
                })
            }
        }
    </script>
@endpush