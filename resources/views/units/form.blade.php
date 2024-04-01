@extends('layouts.app')

@section('button')
    <button class="btn btn-danger" type="submit" id="btn-submit">
        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-save">
            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
            <polyline points="17 21 17 13 7 13 7 21"></polyline>
            <polyline points="7 3 7 8 15 8"></polyline>
        </svg>
        <span>Simpan</span>
    </button>
@endsection

@section('content')
    <div class="statbox widget box box-shadow ">
        <div class="widget-content widget-content-area p-4 pb-5">
            <div class="row mt-2 mb-4">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h6 class="text-danger fw-bold">Informasi Umum</h6>
                </div>
            </div>
            <form
                action="{{ Route::currentRouteName() == 'units.create' ? route('units.store') : route('units.update', $unit->id) }}"
                method="POST" id="form-submit">
                @csrf
                @if (Route::currentRouteName() == 'units.edit')
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class="form-group">
                            <label for="t-text" class="form-label">
                                Name
                                <span class="text-danger">*</span>
                            </label>
                            <input id="t-text" type="text" name="name" placeholder="Bagian Unit Riset"
                                class="form-control form-control-sm" required=""
                                value="{{ isset($unit) ? $unit->name : old('name') }}">
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
