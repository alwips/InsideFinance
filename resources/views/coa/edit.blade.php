@extends('item.item')

@section('title','Ubah Item')

@section('subbreadcrumb')
                        <li class="breadcrumb-item"><a href="#!">Ubah Item</a>
                        </li>
@endsection

@section('subcontent')

@php
    $aktif = '';
    $nonaktif = '';
    if($coa['status'])
        $aktif = ' checked=""';
    else
        $nonaktif = ' checked=""';
@endphp
                        <h4 class="sub-title">Ubah Data Item</h4>
                        <form id="update" method="POST">
                        <input type="hidden" name="id" value="{{$coa['idcoa']}}">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Parent</label>
                                <div class="col-sm-10">
                                    <select name="parent" class="js-example-basic-single">
                                        <option value="{{encrypt(0)}}">Root</option>
                                        {!!$parent!!}
                                    </select>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Akun</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Akun" value="{{$coa['kode']}}">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Akun</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Akun" value="{{$coa['nama']}}">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" id="status-1" value="1" checked=""{{$aktif}}> Aktif
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" id="status-2" value="0"{{$nonaktif}}> Nonaktif
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
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}" />
@endpush
@push('jsplugins')
    <script type="text/javascript" src="{{ asset('assets/custom/coa.js') }}"></script>
    <!-- Select 2 js -->
    <script type="text/javascript" src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush