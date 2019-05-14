@extends('nyoba')

@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">Testimoni Magang</h3>
        </div>
    </div>
    <!-- End Page Header -->
    {{-- Start DataTables --}}
    <div class="row">
        <div class="col">
            <a href="{{url('/testimoni/create')}}" class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add Data</a><br><br>
            <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Data Table - Testimoni Magang</h6>
            </div>
            <div class="card-body">
                {!! $html->table(['class' => 'table table-striped table-bordered'], true) !!}
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
                    url: "{{ url('/testimoni') }}" + "/" + id + "/setFalse",
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: ""
                    },
                    success: function(result) {
                        window.location.href= "{{url('/testimoni')}}";
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