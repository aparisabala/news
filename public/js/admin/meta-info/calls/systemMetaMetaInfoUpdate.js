$(document).ready(function(){
    if ($('#frmSystemMetaMetaInfoUpdate').length > 0) {
        let rules = {
            service_name: {
                required: true,
                maxlength: 253
            }
        };
        PX.ajaxRequest({
            element: 'frmSystemMetaMetaInfoUpdate',
            validation: true,
            script: 'admin/meta-info/update',
            rules,
            afterSuccess: {
                type: 'inflate_redirect_response_data',
            }
        });
    }
});
