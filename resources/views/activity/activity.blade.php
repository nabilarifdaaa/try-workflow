@extends('admin')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
             <a href={{url('/activity/create')}} class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add Data</a><br><br>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Activity DOT</strong>
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
                    url: "{{ url('/activity') }}" + "/" + id + "/setFalse",
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: ""
                    },
                    success: function(result) {
                        window.location.href= "{{url('/activity')}}";
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