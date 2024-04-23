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
            action="" method="POST" id="form-submit">
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
                        <input id="t-text" type="text" name="name" placeholder="Dokumen Pengembangan"
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
