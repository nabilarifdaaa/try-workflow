@extends('admin')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div align="left">
                                <a href={{url('/calonmagang/create')}} class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add Data</a><br><br>
                            </div>
                        </div>
                    </div>
                        <div class="card-header">
                            <strong class="card-title">Calon Magang</strong>
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
                    url: "{{ url('/calonmagang') }}" + "/" + id + "/delete",
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(result) {
                        window.location.href= "{{url('/calonmagang')}}";
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
        function setFlow1(element){
            var id = $(element).attr("data-id");
            var confirm = window.confirm("Are you sure want to change this data?");

            if(confirm) {
                $.ajax({
                    url: "{{ url('/calonmagang')}}"  + "/" + id + "/setFlow1",
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(result) {
                        window.location.href= "{{url('/calonmagang')}}";
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
        function setFlow2(element){
            var id = $(element).attr("data-id");
            var confirm = window.confirm("Are you sure want to change this data?");

            if(confirm) {
                $.ajax({
                    url: "{{ url('/calonmagang')}}"  + "/" + id  + "/setFlow2",
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(result) {
                        window.location.href= "{{url('/calonmagang')}}";
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