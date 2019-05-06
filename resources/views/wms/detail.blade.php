@extends('nyoba')

@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Blog Posts</span>
            <h3 class="page-title">Detail Flow</h3>
        </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!-- Post Overview -->
                <div class='card card-small mb-3'>
                    <div class="card-header border-bottom">
                        <h6 class="m-0">{{$user->flow}} - List State:</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-small list-group-flush">
                            @foreach($flow['states'] as $key=>$value)
                                {{-- @foreach($value['transition'] as $key1=>$subvalue) --}}
                                    {{-- @foreach($subvalue as $key2=>$subsubvalue) --}}
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">{{$key}}</span>
                                        </li>
                                    {{-- @endforeach --}}
                                {{-- @endforeach --}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                <div class="card card-small blog-comments">
                <!-- Post Overview -->
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Detail</h6>
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
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">visibility</i>
                                <strong class="mr-1">Detail State:</strong>
                                {{-- @foreach($stateDetail as $key=>$value)
                                    @foreach($value as $key1=>$value2)
                                        @foreach($value2 as $key2=>$value3)
                                            <li class="list-group-item d-flex px-3">
                                                <span class="text-semibold text-fiord-blue">{{$value3}}</span>
                                            </li>
                                        @endforeach
                                    @endforeach
                                @endforeach --}}
                                <a class="ml-auto" href="#">Edit</a>
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">calendar_today</i>
                                <strong class="mr-1">Next State:</strong> Now
                                <a class="ml-auto" href="#">Edit</a>
                            </span>
                            
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <button class="btn btn-sm btn-outline-accent">
                            <i class="material-icons">save</i> Save Draft</button>
                            <button class="btn btn-sm btn-accent ml-auto">
                            <i class="material-icons">file_copy</i> Publish</button>
                        </li>
                        </ul>
                    </div>
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