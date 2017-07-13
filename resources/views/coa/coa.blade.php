@extends('layouts.flatable')

@section('breadcrumb')
                        <li class="breadcrumb-item"><a href="{{ url('item') }}">COA</a>
                        </li>
@yield('subbreadcrumb')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Master Data COA</h5>
                    <span>Chart of accounts atau yang di dalam bahasa Indonesia disebut Bagan Akun, adalah satu daftar rangkaian akun-akun yang sudah dibuat atau disusun secara sistematis dan teratur dengan menggunakan simbol-simbol huruf, angka, atau panduan antara keduanya yang bermanfaat untuk membantu pemrosesan data, baik secara manual maupun terkomputerisasi, agar lebih mudah diproses, dikontrol, dan dilaporkan.</span>
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
