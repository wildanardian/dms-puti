@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="#">Profile</a></li>
    </ol>
@endsection

@section('button')
    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
        Ubah Password
    </button>
    <a href="{{ route('units.create') }}" class="btn btn-danger ms-2">
        <i class="fa fa-plus"></i>
        <span>Simpan</span>
    </a>
@endsection

@section('content')
    <div class="statbox widget box box-shadow ">
        <div class="widget-content widget-content-area p-4 pb-5">
            <div class="row mt-2 mb-4">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h6 class="text-danger fw-bold">Informasi Umum</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-12 ">
                    <div class="form-group">
                        <label for="t-text" class="form-label">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="name" placeholder="Nama pengguna"
                            class="form-control form-control-sm" required="" disabled
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
                        <input type="username" name="username" id="username" placeholder="Username yang digunakan"
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
                        <input type="email" name="email" id="email" placeholder="Masukan email, ex: budi@gmail.com"
                            class="form-control form-control-sm" required="" disabled
                            value="{{ isset($user) ? $user->email : old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
                aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background-color: #f0f0f0;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePasswordModalLabel">Ubah Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg> ... </svg>
                            </button>
                        </div>
                        <form id="form-submit">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="old_password">
                                        Password Lama
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" name="old_password" class="form-control" id="old_password"
                                            placeholder="Password Lama" aria-label="old_password">
                                    </div>
                                    <div><span class="text-danger" id="old_password_error"></span></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="old_password">
                                        Password Baru
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" name="new_password" class="form-control" id="new_password"
                                            placeholder="Password Baru" aria-label="new_password">
                                    </div>
                                    <div><span class="text-danger" id="new_password_error"></span></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="old_password">
                                        Konfirmasi Password Baru
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" name="confirm_password" class="form-control"
                                            id="confirm_password" placeholder="Konfirmasi Password Baru"
                                            aria-label="confirm_password">
                                    </div>
                                    <div><span class="text-danger" id="confirm_password_error"></span></div>
                                </div>
                                <div><span class="text-danger" id="error_message"></span></div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-dark" data-bs-dismiss="modal"><i
                                        class="flaticon-cancel-12"></i>
                                    Batal</button>
                                <button type="submit" class="btn btn-success" id="btnSubmit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        function hideErrorMessage(inputId) {
            $('#' + inputId + '_error').text('');
        }

        $(document).ready(function() {
            $('#changePasswordButton').click(function() {
                $('#changePasswordModal').modal('show');
            });

            $('#changePasswordModal').on('hidden.bs.modal', function() {
                $('#old_password_error').text('');
                $('#new_password_error').text('');
                $('#confirm_password_error').text('');
                $('#error_message').text('');
            });

            $('#form-submit').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $('#old_password').on('input', function() {
                    hideErrorMessage('old_password');
                });

                $('#new_password').on('input', function() {
                    hideErrorMessage('new_password');
                });

                $('#confirm_password').on('input', function() {
                    hideErrorMessage('confirm_password');
                });

                $.ajax({
                    url: "{{ route('profile.change-password') }}",
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status != 'error') {
                            $('#changePasswordModal').modal('hide');
                            window.location.reload();
                        } else {
                            $.each(response.errors, function(key, value) {
                                $('#' + key + '_error').text(value);
                                $('#' + key).val('');
                            });
                            if (key === 'new_password') {
                                $('#confirm_password').val('');
                            }
                            if (key === 'confirm_password') {
                                $('#new_password').val('');
                            }
                        }
                    },
                });
            });

        });
    </script>
@endpush
