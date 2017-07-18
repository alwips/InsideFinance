@extends('proyek.proyek')

@section('title','Tambah Kegiatan')

@section('subbreadcrumb')
                        <li class="breadcrumb-item"><a href="#!">Tambah Kegiatan</a>
                        </li>
@endsection

@section('subcontent')
                        <h4 class="sub-title">Tambah Data Kegiatan</h4>
                        <form id="store" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="noproyek" id="noproyek" placeholder="Nomor Kegiatan">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="proyek" id="proyek" placeholder="Nama Kegiatan">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Singkatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="singkatnama" id="singkatnama" placeholder="Singkatan Nama Kegiatan">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="daterange" id="daterange" class="form-control" value="01/01/2017 - 08/17/2017" />
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Anggaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control currency" name="anggaran" id="anggaran" placeholder="Anggaran Biaya Kegiatan">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Warna</label>
                                <div class="col-sm-10">
                                    <input type="text" name="warna" id="saturation-demo" class="form-control demo" data-control="saturation" value="#0088cc">
                                    <span class="messages"></span>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="files[]" id="filer_input" multiple="multiple" placeholder="Photo Kegiatan">
                                    <span class="messages"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Kegiatan"></textarea>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
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
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">Simpan</button>
                                </div>
                            </div>
                        </form>
@endsection

@push('cssplugins')
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
    <!-- j-pro js -->
    <script type="text/javascript" src="{{ asset('assets/pages/j-pro/js/autoNumeric.js') }}"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="{{ asset('assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Mini-color js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <!-- jquery file upload js -->
    <script src="{{ asset('bower_components/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ asset('assets/pages/filer/custom-filer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/filer/jquery.fileuploads.init.js') }}" type="text/javascript"></script>


    <script type="text/javascript" src="{{ asset('assets/custom/proyek/proyek.create.js') }}"></script>
    

@endpush