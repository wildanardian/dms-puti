@extends('layouts.app')

@push('style')
    <!-- Tabs -->
    <link href="{{ asset('src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('document-types.index') }}">Tipe Dokumen</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Tipe Dokumen</li>
    </ol>
@endsection

@section('button')
    <button class="btn text-white" type="submit" id="btn-submit" style="background-color: #9f1521">
        <i class="fa fa-save me-2"></i>
        <span>Simpan</span>
    </button>
@endsection

@section('content')
    <div class="statbox widget box box-shadow ">
        <div class="widget-content widget-content-area p-4 pb-5">
            <div class="simple-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Informasi
                            Umum</button>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <form
                            action="{{ Route::currentRouteName() == 'document-types.create' ? route('document-types.store') : route('document-types.update', $documentType->id) }}"
                            method="POST" id="form-submit">
                            @csrf
                            @if (Route::currentRouteName() == 'document-types.edit')
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label for="t-text" class="form-label">
                                            Nama Tipe Dokumen
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input id="t-text" type="text" name="name"
                                            placeholder="ex: Dokumen Perencanaan" class="form-control form-control-sm"
                                            required=""
                                            value="{{ isset($documentType) ? $documentType->name : old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input id="submit-form" type="submit" hidden>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var form = document.getElementById('form-submit');
        var button = document.getElementById('btn-submit');
        button.addEventListener('click', function(event) {
            event.preventDefault();
            form.submit();
        });
    </script>
@endpush
