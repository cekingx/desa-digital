<title><?= $title ?></title>

<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Pengajuan
                </h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-md-3 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        id="kt_datatable_search_query" />
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status Pengajuan:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Semua</option>
                                        <?php foreach($status_pengajuan as $status_pengajuan): ?>
                                            <option><?= $status_pengajuan->status_pengajuan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Layanan:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">Semua</option>
                                        <?php foreach($layanan as $layanan): ?>
                                            <option><?= $layanan->layanan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->

            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>
    </div>
</div>

<script>
$('.preloader').fadeOut();

var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        // url: 'https://preview.keenthemes.com/metronic/theme/html/tools/preview/api/datatables/demos/default.php',
                        url: '<?= base_url('umum/pengajuan/data-pengajuan') ?>',
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: false,
                serverFiltering: false,
                serverSorting: false,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'pengajuan_id',
                title: '#',
                sortable: 'asc',
                width: 45,
                type: 'number',
                selector: false,
                textAlign: 'center',
            }, 
            {
                field: 'layanan',
                title: 'Jenis Layanan',
                autoHide: false,
                // callback function support for column rendering
                template: function(row) {
                    return '<span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">' +
                        row.layanan + '</span>';
                },
            }, 
            {
                field: 'pengajuan_created_at',
                title: 'Tanggal Pengajuan',
                type: 'date',
                template: function(row) {
                    return get_long_date(row.pengajuan_created_at);
                }
            }, 
            {
                field: 'pengajuan_status_pengajuan',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    return '<span class="label font-weight-bold label-lg label-light-info label-inline">' + row.pengajuan_status_pengajuan + '</span>';
                }
            }, 
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 100,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `
                        <button data-id="${row.pengajuan_id}" class="btn btn-clean mr-2 row text-primary bg-primary-o-30 btnShow" title="Show details">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-10-29-133027/theme/html/demo1/dist/../src/media/svg/icons/General/Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                            Lihat
                        </button>
                    `;
                }
            }
            ],

        });

		$('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'pengajuan_status_pengajuan');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'layanan');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

        $(document).on("click", ".btnShow", function() {
            let id = $(this).data('id');
            
            window.location.replace("<?= base_url('umum/pengajuan/show/') ?>" + id);
        });
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});

</script>

