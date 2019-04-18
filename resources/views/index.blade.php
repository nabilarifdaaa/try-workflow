@extends('admin')

@section('content')
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           {!! $html->table(['class' => 'table table-bordered'], true) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    	function deletedata(element){
    		var id = $(element).attr("data-id");
            var confirm = window.confirm("Are you sure want to delete this data?");
            if(confirm) {
                $.ajax({
                    url: "/users/" + id + "/delete",
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: ""
                    },
                    success: function(result) {
                        // console.log(result);
                        window.location.href= "{{ url('/users)) }}";
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