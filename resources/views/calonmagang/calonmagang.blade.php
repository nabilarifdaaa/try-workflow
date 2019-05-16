@extends('nyoba')

@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">Calon Magang</h3>
        </div>
    </div>
    <!-- End Page Header -->
    {{-- Start DataTables --}}
    <div class="row">
        <div class="col-lg-6">
            <div align="left">
                <a href={{url('/calonmagang/create')}} class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add Data</a><br><br>
            </div>
        </div>
        <div class="col-lg-6">
            <div align="right">
                <a href={{url('/listFlow')}} class="btn btn-dark"><i class="material-icons">list</i>&nbsp; Description List Flow</a><br><br>
            </div>
        </div>
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Table - Calon Magang</h6>
                </div>
                <div class="card-body">
                    {!! $html->table(['class' => 'table table-striped table-bordered'], true) !!}
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
        function setFlow(element){
            var id = $(element).attr("data-id");
            var flow = $(element).attr("data-flow");
            var confirm = window.confirm("Are you sure want to change this data?");

            if(confirm) {
                $.ajax({
                    url: "{{ url('/calonmagang')}}"  + "/" + id + "/setFlow/" + flow,
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