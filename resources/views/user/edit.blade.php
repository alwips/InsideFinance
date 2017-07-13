@extends('user.user')

@section('title','Ubah User')

@section('subbreadcrumb')
                        <li class="breadcrumb-item"><a href="#!">Ubah User</a>
                        </li>
@endsection

@section('subcontent')
                        <h4 class="sub-title">Ubah Data User</h4>
                        <form id="update" method="POST">
                        <input type="hidden" name="id" value="{{$user['id']}}">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="role" id="role-1" value="SuperAdmin"{{$user['role']==='SuperAdmin' ? ' checked=""' : ''}}> Super Admin
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="role" id="role-2" value="Keuangan"{{$user['role']==='Keuangan' ? ' checked=""' : ''}}> Keuangan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="role" id="role-3" value="TenagaAhli"{{$user['role']==='TenagaAhli' ? ' checked=""' : ''}}> Tenaga Ahli
                                        </label>
                                    </div>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="{{$user['name']}}">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$user['email']}}">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{$user['username']}}">
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" id="status-1" value="1"{{$user['status']===1 ? ' checked=""' : ''}}> Aktif
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" id="status-2" value="0"{{$user['status']===0 ? ' checked=""' : ''}}> Nonaktif
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
    <script type="text/javascript" src="{{ asset('assets/custom/user.js') }}"></script>
@endpush