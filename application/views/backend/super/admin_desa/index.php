<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">Admin Desa</div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder btnNew">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:../../../../../../../../metronic/themes/metronic/theme/html/demo2/dist/assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Tambah Admin Desa</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            </div>
        </div> 
    </div>
</div>

<script>
    var KTDatatableAdminDesa = function () {
        var demo = function() {
            var datatable = $('#kt_datatable').KTDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '<?= base_url('super/admin-desa/get-admin-desa') ?>',
                            map: function(raw) {
                                var dataset = raw;
                                if(typeof raw.data !== 'undefined') {
                                    dataset = raw.data;
                                }
                                return dataset;
                            }
                        }
                    },
                    pageSize: 10,
                },
                layout: {
                    scroll: false,
                    footer: false
                },
                pagnation: true,
                columns: [
                    {
                        field: 'user_username',
                        title: 'Username',
                        sortable: true,
                        template: function(row) {
                            return '<a href="<?= base_url('super/admin-desa/') ?>'+row.user_id+'">'+row.user_username+'</a>';
                        }
                    },
                    {
                        field: 'user_nama',
                        title: 'Nama'
                    },
                    {
                        field: 'NAMA_KEL',
                        title: 'Kelurahan'
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 100,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            return '\
                                <button data-id="'+row.user_id+'" class="btn btn-sm btn-clean btn-icon mr-2 btnSetting" title="Edit details">\
                                    <span class="svg-icon svg-icon-md">\
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                <rect x="0" y="0" width="24" height="24"/>\
                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
                                            </g>\
                                        </svg><!--end::Svg Icon-->\
                                    </span>\
                                </button>\
                            ';
                        }
                    }
                ]
            });

            $(document).on("click", ".btnSetting", function() {
                let id = $(this).data('id');
                
                window.location.replace("<?= base_url('super/admin-desa/reset-password/') ?>" + id);
            });
        }

        return {
            init: function() {
                demo();
            }
        };
    }();

    $(document).ready(function() {
        KTDatatableAdminDesa.init()
        $('.preloader').fadeOut();
    });

    $('.btnNew').click(function() {
        window.location = '<?= base_url('super/admin-desa/create') ?>'
    })
</script>