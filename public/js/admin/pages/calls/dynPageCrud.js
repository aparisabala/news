$(document).ready(function () {

    if ($("#content").length > 0) {
        PX?.utils?.summerNote('content');
    }

    if ($("#feature_image").length > 0) {
        PX?.initCropper('feature_image', {
            outputWidth: 1280,
            outputHeight: 720,
            mimeType: 'image/jpeg',
            maxFileSize: 100000,
            boundingBox: { width: 400, height: 175 },
            quality: 1
        });
    }

    if ($('#frmStoreDynPage').length > 0) {
        let rules = {
            name: {
                required: true,
                maxlength: 253
            },
            feature_image: {
                required: true,
            },
            content: {
                required: true,
            }
        };
        PX.ajaxRequest({
            element: 'frmStoreDynPage',
            validation: true,
            script: 'admin/pages',
            rules,
            afterSuccess: {
                type: 'inflate_reset_response_data',
            }
        });
    }

    if ($('#frmUpdateDynPage').length > 0) {
        let rules = {
            name: {
                required: true,
                maxlength: 253
            },
            content: {
                required: true,
            }
        };
        PX.ajaxRequest({
            element: 'frmUpdateDynPage',
            validation: true,
            script: 'admin/pages/' + $("#patch_id").val(),
            rules,
            afterSuccess: {
                type: 'inflate_redirect_response_data',
            }
        });
    }

    if ($("#dtDynPage").length > 0) {
        const { pageLang = {} } = PX?.config;
        const { table = {} } = pageLang;
        let col_draft = [
            {
                data: 'id',
                title: table?.id
            },
            {
                data: 'name',
                title: table?.name
            },
             {
                data: 'image',
                title: table?.feature_image
            },
            {
                data: 'created_at',
                title: table?.created
            },

            {
                data: null,
                title: table?.action,
                class: 'text-end',
                render: function (data, type, row) {
                    return `<a href="${baseurl}admin/pages/${data.id}/edit" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </a>`;
                }
            },
        ];
        PX.renderDataTable('dtDynPage', {
            select: true,
            url: 'admin/pages/list',
            columns: col_draft,
            pdf: [1, 2]
        });
    }
})

function dtDynPage(table, api, op) {
    PX.deleteAll({
        element: "deleteAllDynPage",
        script: "admin/pages/delete-list",
        confirm: true,
        api,
    });
    PX.updateAll({
        element: "updateAllDynPage",
        script: "admin/pages/update-list",
        confirm: true,
        dataCols: {
            key: "ids",
            items: [
                {
                    index: 1,
                    name: "ids",
                    type: "input",
                    data: [],
                },
                {
                    index: 1,
                    name: "serial",
                    type: "input",
                    data: []
                }
            ]
        },
        api,
        afterSuccess: {
            type: "inflate_response_data"
        }
    });
    PX?.dowloadPdf({ ...op, btn: "downloadDynPagePdf", dataTable: "yes" })
    PX?.dowloadExcel({ ...op, btn: "downloadDynPageExcel", dataTable: "yes" })
}
