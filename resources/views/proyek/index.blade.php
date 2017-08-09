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
                                            <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#sign-in-modal">Tambah</button>
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

    <script type="text/javascript" src="{{ asset('assets/custom/proyek.js') }}"></script>
@endpush