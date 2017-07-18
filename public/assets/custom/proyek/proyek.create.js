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
    return aksi;
})();

jQuery(document).ready(function($) {
    Proyek.init();
});

$(document).ready(function(){
    $('.currency').autoNumeric('init');
    $('input[name="daterange"]').daterangepicker();
	$('.demo').each( function() {
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
});