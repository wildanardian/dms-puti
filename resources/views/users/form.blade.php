@extends('layouts.app')

@push('style')
    <!-- Tabs -->
    <link href="{{ asset('src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css" />

    <!-- Dropify -->
    <link href="{{ asset('src/assets/css/dropify/dropify.css') }}" rel="stylesheet">
    <link href="{{ asset('src/assets/css/dropify/dropify.min.css') }}" rel="stylesheet">

    <!-- Tom Select-->
    <link href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                                        <input type="text" name="username" id="username"
                                            placeholder="Username yang digunakan" class="form-control form-control-sm"
                                            required="" value="{{ isset($user) ? $user->username : old('username') }}">
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
                                            placeholder="Masukan email, ex: budi@gmail.com"
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
                                            <input type="password" name="password" id="password"
                                                placeholder="Masukkan Password" class="form-control form-control-sm"
                                                required="">
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
                                                placeholder="Konfirmasi Password" class="form-control form-control-sm"
                                                required="">
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
                                        <select id="select_unit" name="select_unit" placeholder="Pilih Unit"
                                            autocomplete="off">
                                            <option value="">Pilih Unit</option>
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
                                        <input id="signature" type="file" class="dropify" data-max-file-size="2M"
                                            name="signature" data-height="100" data-allowed-file-extensions="jpg png jpeg"/>
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

            </div>
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
        var drEvent = $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop an image here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        function ucwords(str) {
            return str.toLowerCase().replace(/\b(\w)/g, function(s) {
                return s.toUpperCase();
            });
        }

        $(document).ready(function() {
            $.ajax({
                url: "{{ route('users.create') }}",
                type: "GET",
                success: function(response) {

                    new TomSelect('#select_unit', {
                        options: response.unit_list,
                        valueField: 'id',
                        labelField: 'name',
                        searchField: ['name'],
                        placeholder: 'Pilih Unit',
                        create: false,
                        preload: true,
                    });

                    var formattedUserTypeList = response.user_type_list.map(function(userType) {
                        return {
                            id: userType,
                            name: ucwords(userType.replace(/-/g,
                                ' ')), // Format name as per your Blade code
                        };
                    });

                    new TomSelect('#select-user', {
                        options: formattedUserTypeList,
                        valueField: 'id',
                        labelField: 'name',
                        searchField: ['name'],
                        placeholder: 'Pilih Tipe User',
                        create: false,
                        preload: true,
                    });
                }
            });
        });

        var form = document.getElementById('form-submit');
        var button = document.getElementById('btn-submit');
        button.addEventListener('click', function(event) {
            event.preventDefault();
            form.submit();
        });
    </script>
@endpush
