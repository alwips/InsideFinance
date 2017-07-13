@extends('layouts.flatable')

@section('breadcrumb')
                        <li class="breadcrumb-item"><a href="{{ url('item') }}">Item</a>
                        </li>
@yield('subbreadcrumb')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Master Data Item</h5>
                    <span>Item (Uraian) adalah keterangan atau penjelasan mengenai suatu hal.</span>
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
