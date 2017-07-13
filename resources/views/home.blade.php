@extends('layouts.flatable')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Selamat Datang, {{ Auth::user()->name }} </h5>
                    <span>Semoga keselamatan dan rahmat Allah, serta keberkahan-Nya terlimpah kepada Anda</span>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <p>
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-home"></i></h4>
                    <h6 class="text-muted m-t-10">Dashboard</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-crown"></i></h4>
                    <h6 class="text-muted m-t-10">Kegiatan</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-receipt"></i></h4>
                    <h6 class="text-muted m-t-10">Rencana Anggaran Biaya</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-ticket"></i></h4>
                    <h6 class="text-muted m-t-10">Realisasi</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-briefcase"></i></h4>
                    <h6 class="text-muted m-t-10">Biaya Perjalan Dinas</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-shopping-cart"></i></h4>
                    <h6 class="text-muted m-t-10">Biaya Perjalanan Dinas</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-user"></i></h4>
                    <h6 class="text-muted m-t-10">User</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-wallet"></i></h4>
                    <h6 class="text-muted m-t-10">Chart of Account</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-layers-alt"></i></h4>
                    <h6 class="text-muted m-t-10">Item</h6>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6 col-xl-3">
        <a href="" style="">
            <div class="card group-widget iconic-menu">
                <div class="card-block-big text-center">
                    <h4 class="text-muted"><i class="ti-ruler-alt-2"></i></h4>
                    <h6 class="text-muted m-t-10">Satuan</h6>
                </div>
            </div>
        </a>
        </div>
    </div>
@endsection
@push('cssplugins')
<style type="text/css">
    .iconic-menu{color:#fff}
    .iconic-menu:hover i{opacity:1;transform:scale(1.1)}
    .iconic-menu i{font-size:48px;opacity:0.4;transition:all ease-in 0.3s}
</style>
@endpush