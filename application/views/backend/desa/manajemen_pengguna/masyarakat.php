<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">Masyarakat Desa</div>
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
                            url: '<?= base_url('desa/manajemen-pengguna/get-masyarakat') ?>',
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
                    },
                    {
                        field: 'user_nama',
                        title: 'Nama'
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
                
                window.location.replace("<?= base_url('desa/manajemen-pengguna/reset-password/') ?>" + id);
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
</script>