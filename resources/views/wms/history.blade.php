@extends('nyoba')

@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Kuota</span>
            <h3 class="page-title">Data Tables</h3>
        </div>
    </div>
    <!-- End Page Header -->
            <div class="row">
                <div class="col">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">History State </h6>
                        </div>
                        <div class="card-body">               
                        {!! $html->table(['class' => 'table table-striped table-bordered'], true) !!}
                        </div>
                    </div>
                </div>
            </div>
        
@endsection

@push("scripts")
    
    {!! $html->scripts  () !!}
@endpush