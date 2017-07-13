@extends('layouts.flatable')

@section('breadcrumb')
                        <li class="breadcrumb-item"><a href="{{ url('satuan') }}">Satuan</a>
                        </li>
@yield('subbreadcrumb')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Master Data Satuan</h5>
                    <span>Satuan adalah sesuatu yang digunakan untuk menyatakan ukuran besaran. Pengertian satuan lainnya adalah sesuatu yang digunakan untuk membandingkan ukuran suatu besaran.</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
@yield('subcontent')
                </div>
            </div>
        </div>
    </div>
@endsection
