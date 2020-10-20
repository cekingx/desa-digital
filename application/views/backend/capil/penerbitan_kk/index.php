<title><?= $title ?></title>

<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Pengajuan Penerbitan KK Baru
                </h3>
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
                                        <?php foreach($status_pengajuan as $status_pengajuan): ?>
                                            <option><?= $status_pengajuan->status_pengajuan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Wilayah:</label>
                                    <select class="form-control" id="kt_datatable_search_wilayah">
                                        <option value="">Semua</option>
                                        <?php foreach($wilayah as $wilayah): ?>
                                            <option><?= $wilayah->wilayah ?></option>
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
                        url: '<?= base_url('capil/pengajuan/penerbitan-kk-baru/data-pengajuan') ?>',
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
                    return '<a href="<?= base_url('capil/pengajuan/penerbitan-kk-baru/show/') ?>' +  row.pengajuan_id + '">' + row.pengajuan_nik + '</a>'
                }
            }, {
                field: 'pengajuan_created_at',
                title: 'Tanggal Pengajuan',
                type: 'date',
                template: function(row) {
                    return get_long_date(row.pengajuan_created_at);
                }
            }, {
                field: 'pengajuan_status_pengajuan',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    return '<span class="label font-weight-bold label-lg label-light-info label-inline">' + row.pengajuan_status_pengajuan + '</span>';
                },
            }, {
                field: 'pengajuan_wilayah',
                title: 'Wilayah',
            }],

        });

		$('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val(), 'pengajuan_status_pengajuan');
        });

        $('#kt_datatable_search_wilayah').on('change', function() {
            datatable.search($(this).val(), 'pengajuan_wilayah');
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

