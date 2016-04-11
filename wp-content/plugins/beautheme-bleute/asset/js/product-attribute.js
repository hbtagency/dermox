jQuery(document).ready(function ($) {

    if($('#_beautheme_is_ticket').attr('checked')) {
        $('#products_metabox, #products_videotrailer').show('fast');
    } else {
        $('#products_metabox, #products_videotrailer').hide('fast');
    }
    $('#_beautheme_is_ticket').click(function(event) {
       var check = $(this).attr('checked');
       if (check==='checked') {
            $('#products_metabox, #products_videotrailer').show('slow');
       }else{
             $('#products_metabox, #products_videotrailer').hide('slow');
       }
    });
});