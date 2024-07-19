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

    <link rel="stylesheet" href="{{ asset('src/assets/css/light/custom.css') }}">
@endpush

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Upload Dokumen</a></li>
    </ol>
@endsection

@section('button')
    <button class="btn text-white" type="submit" id="btn-submit" style="background-color: #9f1521">
        <i class="fa fa-save me-2"></i>
        <span>Simpan</span>
    </button>
@endsection

@section('content')
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area p-4 pb-5">
            <div class="row mt-2 mb-4">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <div class="simple-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Informasi Umum</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">

                                <form action="{{ route('documents.store') }}" method="POST" id="form-submit"
                                    class="mt-4" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-12 ">
                                            <div class="form-group">
                                                <label for="t-text" class="form-label">
                                                    Tipe Dokumen
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select id="select-document-type" name="select_document_type"
                                                    placeholder="Pilih Tipe Dokumen" autocomplete="off">
                                                    <option value="">Pilih Tipe Dokumen</option>
                                                </select>
                                                @error('select_document_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-6 col-12 ">
                                            <div class="form-group">
                                                <label for="t-text" class="form-label">
                                                    No. Dokumen
                                                </label>
                                                <input id="t-text" type="text" name="document_number"
                                                    placeholder="No. Dokumen" class="form-control form-control-sm"
                                                    required="" value="">
                                                @error('document_number')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 ">
                                            <div class="form-group">
                                                <label for="t-text" class="form-label">
                                                    Pemilik Dokumen
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select id="select-document-owner" name="select_document_owner"
                                                    placeholder="Pilih Pemilik Dokumen" autocomplete="off">
                                                </select>
                                                @error('document_owner')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-12 col-12 ">
                                            <div class="form-group">
                                                <label for="t-text" class="form-label">
                                                    Nama Dokumen
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input id="t-text" type="text" name="document_name"
                                                    placeholder="Nama Dokumen" class="form-control form-control-sm"
                                                    required="" value="">
                                                @error('document_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="document_file">
                                                    File Dokumen
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input id="document_file" type="file" class="dropify"
                                                    data-max-file-size="2M" name="document_file" data-height="100" />
                                                @error('document_file')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <input id="submit-form" type="submit" hidden>
                                </form>
                                <div class="row mt-4">
                                    <div class="col-lg-4 col-4 ">
                                        <button class="btn btn-outline-custom" id="button-preview-pdf"
                                            data-bs-toggle="modal" data-bs-target="#pdfModal">Preview
                                            PDF</button>
                                    </div>
                                </div>
                                <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content" style="background-color: #f0f0f0;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pdfModalLabel">Document Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div id="pdfViewer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>

    <!-- Dropify -->
    <script src="{{ asset('src/assets/js/dropify/dropify.js') }}"></script>
    <script src="{{ asset('src/assets/js/dropify/dropify.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

    <script>
        var drEvent = $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            },
        });

        function togglePreviewButton() {
            var documentFile = $('#document_file');
            var buttonPreviewPdf = $('#button-preview-pdf');

            if (documentFile.get(0).files.length === 0) {
                buttonPreviewPdf.hide();
            } else {
                buttonPreviewPdf.show();
            }
        }

        function renderPdf(pdfUrl) {
            fetch(pdfUrl)
                .then(response => response.arrayBuffer())
                .then(data => {
                    pdfjsLib.getDocument(data).promise.then(pdf => {
                        var numPages = pdf.numPages;
                        var pdfViewer = document.getElementById('pdfViewer');
                        pdfViewer.innerHTML = ''; // Clear previous content
                        for (var pageNum = 1; pageNum <= numPages; pageNum++) {
                            pdf.getPage(pageNum).then(page => {
                                var canvas = document.createElement('canvas');
                                var context = canvas.getContext('2d');
                                var viewport = page.getViewport({
                                    scale: 1.0
                                });
                                canvas.height = viewport.height;
                                canvas.width = viewport.width;
                                var renderContext = {
                                    canvasContext: context,
                                    viewport: viewport
                                };
                                page.render(renderContext).promise.then(() => {
                                    pdfViewer.appendChild(canvas);
                                });
                            });
                        }
                    });
                })
                .catch(error => {
                    console.error('Error loading PDF:', error);
                });
        }

        $(document).ready(function() {
            $.ajax({
                url: "{{ route('documents.create') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    new TomSelect('#select-document-type', {
                        valueField: 'id',
                        labelField: 'name',
                        searchField: ['name'],
                        create: false,
                        options: response.documentType,
                    });

                    var documentOwner = [];
                    response.user.forEach(function(item) {
                        documentOwner.push({
                            id: item.id,
                            name: item.name,
                        });
                    });
                    new TomSelect('#select-document-owner', {
                        valueField: 'id',
                        labelField: 'name',
                        searchField: ['name'],
                        create: false,
                        options: documentOwner,
                    });
                },
            });

            togglePreviewButton();

            $('.dropify-clear').click(function() {
                togglePreviewButton();
            });

            $('#document_file').on('change', function() {
                togglePreviewButton();
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var pdfUrl = e.target.result;
                    document.getElementById('button-preview-pdf').disabled = false;
                    document.getElementById('button-preview-pdf').addEventListener('click', function() {
                        renderPdf(pdfUrl);
                    });
                };
                reader.readAsDataURL(file);
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
