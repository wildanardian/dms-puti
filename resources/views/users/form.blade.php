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
                action="{{ Route::currentRouteName() == 'users.create' ? route('users.store') : route('users.update', $user->id) }}"
                method="POST" id="form-submit">
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
                            <input id="t-text" type="text" name="name" placeholder="Budi"
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
                            <input id="t-text" type="username" name="username" placeholder="budi"
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
                            <input id="t-text" type="email" name="email" placeholder="budi@gmail.com"
                                class="form-control form-control-sm" required=""
                                value="{{ isset($user) ? $user->email : old('email') }}">
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
                                <input id="t-text" type="password" name="password" placeholder="****"
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
                                <input id="t-text" type="password" name="confirm-password" placeholder="****"
                                    class="form-control form-control-sm" required="">
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
                            <select id="select-unit" name="select-unit" placeholder="Pilih Unit" autocomplete="off">
                                <option value="">Pilih Unit</option>
                                @foreach ($unit as $index => $u)
                                    <option value="{{ $index + 1 }}">{{ $u }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="select-user">
                                Tipe User
                            </label>
                            <select id="select-user" name="select-user" placeholder="Pilih Tipe User"
                                autocomplete="off">
                                <option value="">Pilih Tipe User</option>
                                @foreach ($user_type as $index => $u)
                                    @php
                                        $formatUserType = ucwords(str_replace('-', ' ', $u));
                                    @endphp
                                    <option value="{{ $u }}">{{ $formatUserType }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="filepond">
                                Upload Tanda Tangan
                                <span class="text-danger">*</span>
                            </label>
                            <div class="multiple-file-upload">
                                <input type="file" class="filepond file-upload-multiple" name="filepond" multiple
                                    data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                            </div>

                        </div>
                    </div>
                </div>
                <input id="submit-form" type="submit" hidden>
            </form>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .filepond-root .filepond-hopper {
            border-radius: 5px !important;
        }
    </style>
@endpush

@push('script')
    <script>
        var form = document.getElementById('form-submit');
        var button = document.getElementById('btn-submit');
        button.addEventListener('click', function(event) {
            event.preventDefault();
            form.submit();
        });

        new TomSelect("#select-unit", {
            create: true,
        });
        new TomSelect("#select-user", {
            create: true,
        });

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            // FilePondPluginImageEdit
        );

        // Select the file input and use
        // create() to turn it into a pond
        FilePond.create(
            document.querySelector('.file-upload-multiple')
        );
    </script>
@endpush
