var Proyek = (function() {
    "use strict";

    var base_url = 'http://'+location.host+'/kegiatan';
    $.ajaxSetup({
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var aksi = {};

    aksi.init = function () {
        aksi.store();
        aksi.update();
        aksi.view();
        aksi.detail();
        aksi.delete();
        aksi.status();
    };

    aksi.store = () => {
        $("form#store").submit(function(e){
            e.preventDefault(); // prevent page refresh
            $.ajax({
                url: base_url,
                type: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (data.status == 'success') {
                        window.location.assign(base_url);
                    } else {
                        console.log(data.msg);
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    };
    aksi.update = () => {
        $("form#update").submit(function(e){
            e.preventDefault(); // prevent page refresh
            var id = $('input[name="id"]').val();
            $.ajax({
                url: base_url+'/req/'+id,
                type: 'POST',
                data: $(this).serialize()+"&_method=PATCH",
                success: function (data) {
                    if (data.status == 'success') {
                        window.location.assign(base_url);
                    } else {
                        console.log(data.msg);
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    };
    aksi.delete = () => { 
        //Alert confirm
         $('#dt-ajax-object tbody').on('click','a[href="#delete"]', function(e){
            e.preventDefault(); // prevent page refresh
            var thisDel = $(this);
            var id = thisDel.closest('tr').data('key');

            swal({
                title: "Are you sure?",
                text: "Data yang dihapus, tidak bisa dikembalikan!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },
            function(){
                $.ajax({
                    url: base_url+'/req/'+id,
                    type: 'POST',
                    data: {_method:'DELETE'},
                    success: function (data) {
                        if (data.status == 'success') {
                            setTimeout(function () {
                                swal("Deleted!", data.msg, data.type);
                                thisDel.closest('tr').fadeOut('slow');
                            }, 2000);
                        } else {
                            setTimeout(function () {
                                swal("Gagal!", "Data yang Anda pilih tidak terhapus !", "error");
                            }, 2000);
                        }
                    },
                    error: function (data) {
                        setTimeout(function () {
                            swal("Gagal!", "Data yang Anda pilih tidak terhapus !", "error");
                            notify('Data gagal di proses, silahkan hubungi Technical Support ', 'danger');
                        }, 2000);
                    }
                });
            });
        });
    }
    aksi.view = () => {
        $('#dt-ajax-object').DataTable({
            "ajax": {
                "dataType": 'json',
                "contentType": "application/json; charset=utf-8",
                "url":base_url+'/listdata',
                "dataSrc": function (response) {
                   return response.data;
                }
            },
            "createdRow" : function(row,data,dataIndex){
                $(row).attr('data-key',data.idproyek);
            },
            "columns": [
                { "data": function(row, type, val, meta) {
                    return row.proyek+' ('+row.singkatnama+')';
                } },
                { "data": function(row, type, val, meta) {
                    return row.startdate+' - '+row.duedate;
                } },
                { "data": "anggaran" },
                { "data": "status", "render": function (status, type, full, meta) {
                    if(status)
                        var status = '<a href="#status" class="label label-success"><i class="ti-link"></i>Aktif</a>';
                    else
                        var status = '<a href="#status" class="label label-warning"><i class="ti-unlink"></i>Nonaktif</a>';

                    return status;
                }},
                { "data": "idproyek", "render": function(idproyek, type, full, meta) {
                    return `<a href="`+base_url+`/req/`+idproyek+`/edit" class="icofont icofont-ui-edit"></a> | \
                    <a href="#delete"><i class="icofont icofont-ui-delete"></i></a> | \
                    <a href="#detail"><i class="icofont icofont-eye-alt"></i></a>
                    `;
                }}
            ],
          "order": [[3, 'asc']]
        });
    }
    aksi.detail = () => {
        $('#dt-ajax-object tbody').on('click','a[href="#detail"]', function(e){
            e.preventDefault(); // prevent page refresh
            $('#detaildata').modal('show');
            var thisDetail = $(this);
            var id = thisDetail.closest('tr').data('key');
            var $loading = $('#preload').hide();
            $(document)
            .ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $.ajax({
                url: base_url+'/req/'+id,
                type: 'GET',
                success: function (data) {
                    if(data.status)
                        data.status = 'Aktif';
                    else
                        data.status = 'Nonaktif';
                    $(".modal-body").html('\
                        <table>\
                            <tr>\
                                <td>proyek</td>\
                                <td>:</td>\
                                <td>'+data.proyek+'</td>\
                            </tr>\
                            <tr>\
                                <td>Keterangan</td>\
                                <td>:</td>\
                                <td>'+data.keterangan+'</td>\
                            </tr>\
                            <tr>\
                                <td>Status</td>\
                                <td>:</td>\
                                <td>'+data.status+'</td>\
                            </tr>\
                        </table>')
                },
                error: function (data) {
                    notify('Data gagal di proses, silahkan hubungi Technical Support ', 'danger');
                    // console.log('Error:', data);
                }
            });
        });    
    }
    aksi.status = () => {
         $('#dt-ajax-object tbody').on('click','a[href="#status"]', function(e){
            e.preventDefault(); // prevent page refresh
            var thisStat = $(this);
            var status = thisStat.text();
            var id = thisStat.closest('tr').data('key');
            if(status=='Aktif')
                var baseurl = base_url+'/disable/'+id;
            else
                var baseurl = base_url+'/enable/'+id;

            $.ajax({
                url: baseurl,
                type: 'POST',
                data: {_method:'PATCH'},
                success: function (data) {
                    if (data.status == 'success') {
                        if(status=='Aktif')
                            status = '<a href="#status" class="label label-warning"><i class="ti-unlink"></i>Nonaktif</a>';
                        else
                            status = '<a href="#status" class="label label-success"><i class="ti-link"></i>Aktif</a>';

                        notify(data.msg, data.type);
                        thisStat.closest('td').append(status);
                        thisStat.remove();

                    } else {
                        notify('Data gagal di proses, silahkan tekan (ctrl+F5) ', 'danger');
                    }
                },
                error: function (data) {
                    notify('Data gagal di proses, silahkan hubungi Technical Support ', 'danger');
                    // console.log('Error:', data);
                }
            });
        });
    }
    return aksi;
})();

jQuery(document).ready(function($) {
    Proyek.init();
});

$(document).ready(function(){
    $('.currency').autoNumeric('init');
    $('input[name="daterange"]').daterangepicker();
});