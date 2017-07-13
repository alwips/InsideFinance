@extends('satuan.satuan')

@section('title','Tambah Satuan')

@section('subbreadcrumb')
                        <li class="breadcrumb-item"><a href="#!">Tambah Satuan</a>
                        </li>
@endsection

@section('subcontent')
                        <h4 class="sub-title">Tambah Data Satuan</h4>
                        <form id="store" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Nama Satuan">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Satuan"></textarea>
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
@endpush
@push('jsplugins')
    <script type="text/javascript" src="{{ asset('assets/custom/satuan.js') }}"></script>
@endpush