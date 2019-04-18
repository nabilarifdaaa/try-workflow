@extends('admin')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                     <div class="row">
                        <div class="col col-lg-6">
                            <div align="left">
                                <a href="{{url('/posisi/create')}}" class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add Data</a><br><br>
                            </div>
                        </div>
                        <div class="col-lg-6" align="right">
                            <div class="btn-group" >
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Set All Status
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item"  onclick="setStatus(this)" type="button">Open All</button>
                                    <button class="dropdown-item" onclick="setStatusFalse(this)" type="button">Close All</button>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Posisi Magang</strong>
                        </div>
                        <div class="card-body">               
                            {!! $html->table(['class' => 'table table-striped table-bordered'], true) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script type="text/javascript">
        function deletedata(element){
            var id = $(element).attr("data-id");
            var confirm = window.confirm("Are you sure want to delete this data?");
            if(confirm) {
                $.ajax({
                    url: "{{ url('/posisi') }}" + "/" + id + "/delete",
                    type: "DELETE",
                    dataType:"json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: ""
                    },
                    success: function(result) {
                        window.location.href= "{{url('/posisi')}}";
                    },
                    fail: function(error) {
                        alert("Error");
                        console.log(error);
                    } 
                })
            }
        }
    </script>
    <script type="text/javascript">
        function setStatus(element){
            var id = $(element);
            var confirm = window.confirm("Are you sure want to change this data?");

            if(confirm) {
                $.ajax({
                    url: "{{ url('/posisi/setStatus') }}",
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(result) {
                        console.log(result);
                        window.location.href= "{{url('/posisi')}}";
                    },
                    fail: function(error) {
                        alert("Error");
                        console.log(error);
                    } 
                })
            }
        }
    </script>
    <script type="text/javascript">
        function setStatusFalse(element){
            var id = $(element);
            var confirm = window.confirm("Are you sure want to change this data?");

            if(confirm) {
                $.ajax({
                    url: "{{ url('/posisi/setStatusFalse') }}",
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(result) {
                        window.location.href= "{{url('/posisi')}}";
                    },
                    fail: function(error) {
                        alert("Error");
                        console.log(error);
                    } 
                })
            }
        }
    </script>
    <script type="text/javascript">
        function setTrue(element){
            var id = $(element).attr("data-id");
            var confirm = window.confirm("Are you sure want to change this data?");
            if(confirm) {
                $.ajax({
                    url: "{{ url('/posisi') }}" + "/" + id + "/setTrue",
                    type: "PUT",
                    dataType:"json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: ""
                    },
                    success: function(result) {
                        window.location.href= "{{url('/posisi')}}";
                    },
                    fail: function(error) {
                        alert("Error");
                        console.log(error);
                    } 
                })
            }
        }
    </script>
    <script type="text/javascript">
        function setFalse(element){
            var id = $(element).attr("data-id");
            var confirm = window.confirm("Are you sure want to delete this data?");
            if(confirm) {
                $.ajax({
                    url: "{{ url('/posisi') }}" + "/" + id + "/setFalse", 
                    type: "PUT",
                    dataType:"json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: ""
                    },
                    success: function(result) {
                        window.location.href= "{{url('/posisi')}}";
                    },
                    fail: function(error) {
                        alert("Error");
                        console.log(error);
                    } 
                })
            }
        }
    </script>
    {!! $html->scripts  () !!}
@endpush