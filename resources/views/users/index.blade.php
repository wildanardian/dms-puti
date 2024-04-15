@extends('layouts.app')

@push('style')
    <!-- Sweet Alert -->
    <link href="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kelola User</li>
    </ol>
@endsection

@section('button')
    <a href="{{ route('users.create') }}" class="btn btn-danger d-flex align-items-center">
        <i data-feather="plus" class="me-2"></i>
        <span>Buat User</span>
    </a>
@endsection

@section('content')
    <div class="statbox widget box box-shadow">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <div class="table-responsive">
                    <table id="table" class="table dt-table-hover dataTable no-footer" style="width: 100%">
                        <thead>
                            <tr role="row">
                                <th class="text-center" tabindex="0" aria-controls="table" rowspan="1" colspan="1"
                                    aria-label="Name: activate to sort column descending" style="width:15px">No</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1"
                                    aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                    style="width: 100px;">Nama
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 220px;">Unit
                                </th>
                                <th class="no-content sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-label="Action: activate to sort column ascending"
                                    style="width: 48px;">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.index') }}",
                    type: "GET",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'users.name'
                    },
                    {
                        data: 'unit',
                        name: 'units.name'
                    },
                    {
                        data: 'id',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
                                <div class="d-inline dropdown">
                                    <button class="btn btn-sm btn-primary rounded-circle dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('users.index') }}/${data}/edit">Ubah</a></li>
                                        <li><a class="dropdown-item delete-item" href="#" data-id="${data}">Hapus</a></li>
                                    </ul>
                                </div>
                            `;
                        }
                    }
                ],
                order: [
                    [1, 'desc']
                ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: 'Result : _MENU_',
                },
                "initComplete": function() {
                    feather.replace();
                }
            });

            $(document).on('click', '.delete-item', function(e) {
                var id = $(this).data('id')

                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, Anda tidak akan dapat memulihkan data tersebut!",
                    icon: "warning",
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('users.destroy', ':user') }}".replace(':user',
                                id),
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE",
                            },
                            success: function(response) {
                                window.location.reload();
                                table.ajax.reload();
                            }
                        })
                    }
                });
            });
        });
    </script>
@endpush
