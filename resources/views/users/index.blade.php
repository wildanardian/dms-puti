@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kelola User</li>
    </ol>
@endsection

@section('button')
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
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
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending" style="width: 125px;">Tanggal
                                    Dibuat
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
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
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
                ajax: "{{ route('users.index') }}",
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
                        data: 'created_at',
                        name: 'users.created_at',
                        render: function(data) {
                            var date = new Date(data);
                            var day = date.getDate();
                            var monthIndex = date.getMonth();
                            var year = date.getFullYear();

                            var monthNames = [
                                "Jan", "Feb", "Mar",
                                "Apr", "May", "Jun", "Jul",
                                "Aug", "Sep", "Oct",
                                "Nov", "Dec"
                            ];

                            return day + '/' + monthNames[monthIndex] + '/' + year;
                        }
                    },
                    {
                        data: 'id',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
                                <div class="d-flex gap-2 align-items-center justify-content-center">
                                    <a href="{{ route('users.index') }}/${data}/edit" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('users.destroy', ':user') }}/" method="POST" id="delete_form_${data}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger btn-sm" onclick="deleteData(${data})">Hapus</a>
                                    </form>
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
            });
        });

        function deleteData(id) {
            var form = $('#delete_form_' + id);
            var action = form.attr('action');
            action = action.replace(':user', id);
            form.attr('action', action);

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkan data tersebut!",
                icon: "warning",
                showCancelButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    form.submit();
                    $('#table').DataTable().ajax.reload();
                }
            });
        }
    </script>
@endpush
