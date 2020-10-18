<title><?= $title ?></title>

<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Pengajuan
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="<?= base_url('desa/pengajuan/buat-pengajuan') ?>" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon--></span> Pengajuan Baru
                </a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        id="kt_datatable_search_query" />
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status Pengajuan:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Semua</option>
                                        <option value="1">TAHAP 1</option>
                                        <option value="2">TAHAP 2</option>
                                        <option value="3">TAHAP 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Layanan:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Penerbitan KK Baru</option>
                                        <option value="2">Penerbitan KTP</option>
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
                        url: '<?= base_url('desa/pengajuan/data-pengajuan') ?>',
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
                width: 30,
                type: 'number',
                selector: false,
                textAlign: 'center',
            }, {
                field: 'pengajuan_nik',
                title: 'NIK Pemohon',
                template: function(row) {
                    return '<a href="<?= base_url('desa/pengajuan/show/') ?>' +  row.pengajuan_id + '">' + row.pengajuan_nik + '</a>'
                }
            }, {
                field: 'pengajuan_created_at',
                title: 'Tanggal Pengajuan',
                type: 'date',
                template: function(row) {
                    return get_long_date(row.pengajuan_created_at);
                }
            }, {
                field: 'pengajuan_status_pengajuan_id',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'TAHAP 1',
                            'class': ' label-light-info'
                        },
                        2: {
                            'title': 'TAHAP 2',
                            'class': ' label-light-info'
                        },
                        3: {
                            'title': 'TAHAP 3',
                            'class': ' label-light-success'
                        },
                    };
                    return '<span class="label font-weight-bold label-lg ' + status[row.pengajuan_status_pengajuan_id].class + ' label-inline">' + status[row.pengajuan_status_pengajuan_id].title + '</span>';
                },
            }, {
                field: 'pengajuan_jenis_layanan',
                title: 'Jenis Layanan',
                autoHide: false,
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'Penerbitan KK Baru',
                            'state': 'primary'
                        },
                        2: {
                            'title': 'Penerbitan KTP',
                            'state': 'primary'
                        },
                    };
                    return '<span class="label label-' + status[row.pengajuan_jenis_layanan].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.pengajuan_jenis_layanan].state + '">' +
                        status[row.pengajuan_jenis_layanan].title + '</span>';
                },
            }],

        });

		$('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'pengajuan_status_pengajuan_id');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'pengajuan_jenis_layanan');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
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

