@extends('layouts.app')

@push('style')
    <!-- Dropify -->
    <link href="{{ asset('src/assets/css/dropify/dropify.css') }}" rel="stylesheet">
    <link href="{{ asset('src/assets/css/dropify/dropify.min.css') }}" rel="stylesheet">

    <!-- Tom Select-->
    <link href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('button')
    <button class="btn btn-danger" type="submit" id="btn-submit">
        <i data-feather="save" class="me-2"></i>
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
                action="{{ Route::currentRouteName() == 'users.create' ? route('users.store') : route('users.update', $user->id) }}"
                method="POST" id="form-submit" enctype="multipart/form-data">
                @csrf
                @if (Route::currentRouteName() == 'users.edit')
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-lg-4 col-12 ">
                        <div class="form-group">
                            <label for="t-text" class="form-label">
                                Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" id="name" placeholder="Nama pengguna"
                                class="form-control form-control-sm" required=""
                                value="{{ isset($user) ? $user->name : old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="form-group">
                            <label for="t-text">
                                Username
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="username" id="username" placeholder="Username yang digunakan"
                                class="form-control form-control-sm" required=""
                                value="{{ isset($user) ? $user->username : old('username') }}">
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="form-group">
                            <label for="t-text">
                                Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" id="email"
                                placeholder="Masukan email, ex: budi@gmail.com" class="form-control form-control-sm"
                                required="" value="{{ isset($user) ? $user->email : old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                @if (Route::currentRouteName() != 'users.edit')
                    <div class="row mt-4">
                        <div class="col-lg-6 col-12 ">
                            <div class="form-group">
                                <label for="t-text">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="password" id="password" placeholder="Masukkan Password"
                                    class="form-control form-control-sm" required="">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 ">
                            <div class="form-group">
                                <label for="t-text">
                                    Password Confirmation
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="confirm-password" id="confirm-password"
                                    placeholder="Konfirmasi Password" class="form-control form-control-sm" required="">
                                @error('confirm-password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row mt-5">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Informasi Tipe Pengguna</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="select-unit">
                                Unit
                            </label>
                            <select id="select-unit" name="select_unit" placeholder="Pilih Unit" autocomplete="off">
                                <option value="">Pilih Unit</option>
                                @foreach ($unit_list as $u)
                                    <option value="{{ $u->id }}" {{ isset($user) && $user->unit_id == $u->id ? 'selected' : '' }}>
                                        {{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="select-user">
                                Tipe User
                            </label>
                            <select id="select-user" name="select_user" placeholder="Pilih Tipe User"
                                autocomplete="off">
                                <option value="">Pilih Tipe User</option>
                                @foreach ($user_type_list as $index => $u)
                                    @php
                                        $formatUserType = ucwords(str_replace('-', ' ', $u));
                                        $selectedUserType = isset($user) && $selected_user_type == $u ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $u }}" {{ $selectedUserType }}>
                                        {{ $formatUserType }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="signature">
                                Upload Tanda Tangan
                                <span class="text-danger">*</span>
                            </label>
                            <input id="signature" type="file" class="dropify" data-max-file-size="2M" name="signature"
                                data-height="75" />
                            @error('signature')
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
    <!-- TomSelect -->
    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>

    <!-- Dropify -->
    <script src="{{ asset('src/assets/js/dropify/dropify.js') }}"></script>
    <script src="{{ asset('src/assets/js/dropify/dropify.min.js') }}"></script>

    <script>
        feather.replace();

        new TomSelect("#select-unit", {
            create: true,
        });
        new TomSelect("#select-user", {
            create: true,
        });

        var drEvent = $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        var form = document.getElementById('form-submit');
        var button = document.getElementById('btn-submit');
        button.addEventListener('click', function(event) {
            event.preventDefault();
            form.submit();
        });

    </script>
@endpush
