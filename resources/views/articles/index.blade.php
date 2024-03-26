@extends('layouts.app')

@section('content')
<div class="statbox widget box box-shadow">
    <div class="widget-header">
        <div class="row mt-2">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Input Text</h4>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        {{ $dataTable->table() }}
    </div>
</div>
@endsection

@push('script')
    {{ $dataTable->scripts() }}
@endpush
