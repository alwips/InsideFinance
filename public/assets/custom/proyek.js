var Proyek = (function() {
    "use strict";
    var url = 'http://'+location.host+'/';
    var base_url = url+'kegiatan';
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
        aksi.upload();
    };
    aksi.upload = () => {
        $('#filer_input').filer({
            limit: null,
            maxSize: null,
            extensions: null,
            changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag & Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn btn btn-primary waves-effect waves-light">Browse Files</a></div></div>',
            showThumbs: true,
            theme: "dragdropbox",
            templates: {
                box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li>{{fi-progressBar}}</li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                                <div class="jFiler-item-container">\
                                    <div class="jFiler-item-inner">\
                                        <div class="jFiler-item-thumb">\
                                            <div class="jFiler-item-status"></div>\
                                            <div class="jFiler-item-info">\
                                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                                <span class="jFiler-item-others">{{fi-size2}}</span>\
                                            </div>\
                                            {{fi-image}}\
                                        </div>\
                                        <div class="jFiler-item-assets jFiler-row">\
                                            <ul class="list-inline pull-left">\
                                                <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                            </ul>\
                                            <ul class="list-inline pull-right">\
                                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                            </ul>\
                                        </div>\
                                    </div>\
                                </div>\
                            </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: false,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-items-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action'
                }
            },
            dragDrop: {
                dragEnter: null,
                dragLeave: null,
                drop: null,
            },
            uploadFile: {
                url: url+'uploads/kegiatan',
                type: 'POST',
                data: null,
                enctype: 'multipart/form-data',
                beforeSend: function(){},
                success: function(data, el){
                    var parent = el.find(".jFiler-jProgressBar").parent();
                    el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                        $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                    });
                    // el.find(".jFiler-item-trash-action").attr('data-path', data.path);
                    $('<input type="hidden" name="photo[]" value="'+data.path+'">').appendTo(parent);
                },
                error: function(el){
                    var parent = el.find(".jFiler-jProgressBar").parent();
                    el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                        $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
                    });
                },
                statusCode: null,
                onProgress: null,
                onComplete: null
            },
            addMore: false,
            clipBoardPaste: true,
            excludeName: null,
            beforeRender: null,
            afterRender: null,
            beforeShow: null,
            beforeSelect: null,
            onSelect: null,
            afterShow: null,
            onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
                var path = itemEl.find('input').val();
                $.post(url+'uploads/delkegiatan', {path: path});
            },
            onEmpty: null,
            options: null,
            captions: {
                button: "Choose Files",
                feedback: "Choose files To Upload",
                feedback2: "files were chosen",
                drop: "Drop file here to Upload",
                removeConfirmation: "Are you sure you want to remove this file?",
                errors: {
                    filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                    filesType: "Only Images are allowed to be uploaded.",
                    filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                    filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
                }
            }
            // file:
            // {
            //     data: {
            //         url: 'http://your_link.com/',
            //         another_attribute: 'ok',
            //         you_can_use_it_later: 'hehe',
            //         also_in_templates: 'perfect'
            //     }
            // }
        });
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
    $('input[name="daterange"]').daterangepicker({
        parentEl : $('#ontopmodal'),
    });
});

$('.warna').each( function() {
                
    $(this).minicolors({
        control: $(this).attr('data-control') || 'hue',
        defaultValue: $(this).attr('data-defaultValue') || '',
        format: $(this).attr('data-format') || 'hex',
        keywords: $(this).attr('data-keywords') || '',
        inline: $(this).attr('data-inline') === 'true',
        letterCase: $(this).attr('data-letterCase') || 'lowercase',
        opacity: $(this).attr('data-opacity'),
        position: $(this).attr('data-position') || 'bottom left',
        swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
        change: function(value, opacity) {
            if( !value ) return;
            if( opacity ) value += ', ' + opacity;
            if( typeof console === 'object' ) {
                console.log(value);
            }
        },
        theme: 'bootstrap'
    });

});
