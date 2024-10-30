jQuery(document).ready(function () {

    jQuery('#confirm-delete').on('show.bs.modal', function (e) {
        jQuery(this).find('.btn-ok').attr('href', jQuery(e.relatedTarget).data('href'));
    });

});