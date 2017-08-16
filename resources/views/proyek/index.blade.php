@extends('proyek.proyek')

@section('title','Daftar Kegiatan')

@section('subbreadcrumb')
                        <li class="breadcrumb-item"><a href="#!">Daftar Kegiatan</a>
                        </li>
@endsection

@section('subcontent')
@if(session()->has('flash_message'))
   <div class="alert alert-primary background-primary">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icofont icofont-close-line-circled text-white"></i>
        </button>
        <strong>{{ session('flash_message') }}</strong>
    </div>
@endif
                                    <div class="row modal-mob-btn">
                                        <div class="col-sm-6">
                                            <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#forminput">Tambah</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-inverse btn-lg btn-block" data-toggle="modal" data-target="#pwd-recovery">Download</button>
                                        </div>
                                    </div>
                                    <hr>
                                <div class="table-responsive dt-responsive">
                                    <table id="dt-ajax-object" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                                <th>Anggaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                                <th>Anggaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div id="detaildata" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Detail Data</h4>
                                      </div>
                                        <div class="loader-block" id="preload">
                                            <svg id="loader2" viewBox="0 0 100 100">
                                                <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
                                            </svg>
                                        </div>
                                      <div class="modal-body">
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>               
                                </div>

    <!-- Sign in modal start -->
    <div class="modal fade" id="forminput" role="dialog">
        <div id="ontopmodal"></div>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="store" method="POST">
                <div class="modal-body p-b-0">
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">No Kegiatan</label>
                            <input type="text" class="form-control" name="noproyek" id="noproyek" placeholder="Nomor Kegiatan">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="proyek" id="proyek" placeholder="Nama Kegiatan">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">Nama Singkatan</label>
                            <input type="text" class="form-control" name="singkatnama" id="singkatnama" placeholder="Singkatan Nama Kegiatan">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">Tanggal</label>
                            <input type="text" name="daterange" id="daterange" class="form-control" value="01/01/2017 - 08/17/2017" />
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">Anggaran</label>
                            <input type="text" class="form-control currency" name="anggaran" id="anggaran" placeholder="Anggaran Biaya Kegiatan">
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">Warna</label>
                            <input type="text" name="warna" class="form-control warna" value="#0088cc">
                            <span class="messages"></span>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">Photo</label>
                            <input type="file" class="form-control" name="files[]" id="filer_input" multiple="multiple" placeholder="Photo Kegiatan">
                            <span class="messages"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                        <label class="col-form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Kegiatan"></textarea>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="status-1" value="1" checked=""> Aktif
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="status-2" value="0"> Nonaktif
                                </label>
                            </div>
                            <span class="messages"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary m-b-0">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign in modal end -->
@endsection

@push('cssplugins')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/sweetalert/dist/sweetalert.css') }}">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/component.css') }}">

    <!-- FORM -->
    <!-- j-pro js -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/j-pro/css/j-forms.css') }}">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" />
    <!-- Color Picker css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/spectrum/spectrum.css') }}" />
    <!-- Mini-color css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/jquery-minicolors/jquery.minicolors.css') }}" />
    <!-- jquery file upload Frame work -->
    <link href="{{ asset('bower_components/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
@endpush
@push('jsplugins')
    <!-- data-table js -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- sweet alert js -->
    <script type="text/javascript" src="{{ asset('bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
    <!-- sweet alert modal.js intialize js -->

    <!-- FORM -->
    <!-- j-pro js -->
    <script type="text/javascript" src="{{ asset('assets/pages/j-pro/js/autoNumeric.js') }}"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="{{ asset('assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Mini-color js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <!-- jquery file upload js -->
    <script src="{{ asset('bower_components/jquery.filer/js/jquery.filer.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/custom/proyek.js') }}"></script>
@endpush