@extends('layouts.flatable')

@section('breadcrumb')
                        <li class="breadcrumb-item"><a href="{{ url('kegiatan') }}">Kegiatan</a>
                        </li>
@yield('subbreadcrumb')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Master Data Kegiatan</h5>
                    <span>Proyek adalah sebuah kegiatan yang bersifat sementara yang telah ditetapkan awal pekerjaannya dan waktu selesainya (dan biasanya selalu dibatasi oleh waktu, dan seringkali juga dibatasi oleh sumber pendanaan).</span>
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
