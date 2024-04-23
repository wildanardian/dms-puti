@extends('layouts.app')

@section('button')
    <button class="btn text-white" type="submit" id="btn-submit" style="background-color: #9f1521">
        <i class="fa fa-save me-2"></i>
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
                    <div class="col-lg-6 col-12 ">
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
                    <div class="col-lg-6 col-12 ">
                        <div class="form-group">
                            <label for="t-text" class="form-label">
                                Parent Unit
                            </label>
                            <select id="select-unit" name="select_parent_unit" placeholder="Pilih Unit" autocomplete="off"
                                class="form-control form-control-sm">
                                <option value="">Pilih Unit</option>
                                @foreach ($units as $item)
                                    <option value="{{ $item->id }}" @if (isset($unit) && $unit->parent_id == $item->id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('select_parent_unit')
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
        feather.replace();
        var form = document.getElementById('form-submit');
        var button = document.getElementById('btn-submit');
        button.addEventListener('click', function(event) {
            event.preventDefault();
            form.submit();
        });
    </script>
@endpush
