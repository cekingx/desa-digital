
<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">F-1.01</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Formulir Biodata Penduduk Warna Negara Indonesia</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xxl-7">
                        <form class="form" id="f101">
                            <!-- begin::nama-kepala-keluarga -->
                            <div class="form-group">
                                <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                                <input 
                                    id="nama_kepala_keluarga"
                                    name="nama_kepala_keluarga"
                                    type="text" 
                                    class="form-control">
                            </div>
                            <!-- end::nama-kepala-keluarga -->
                            <!-- begin::alamat -->
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input 
                                    id="alamat"
                                    name="alamat"
                                    type="text" 
                                    class="form-control">
                            </div>
                            <!-- end::alamat -->
                            <div class="form-group row">
                                <!-- begin::rt -->
                                <div class="col-6">
                                    <label>RT</label>
                                    <input 
                                        id="rt"
                                        name="rt"
                                        type="text" 
                                        class="form-control">
                                </div>
                                <!-- end::rt -->
                                <!-- begin::rw -->
                                <div class="col-6">
                                    <label>RW</label>
                                    <input 
                                        id="rw"
                                        name="rw"
                                        type="text" 
                                        class="form-control">
                                </div>
                                <!-- end::rw -->
                            </div>
                            <!-- begin::jumlah-anggota-keluarga -->
                            <div class="form-group">
                                <label for="jumlah_anggota_keluarga">Jumlah Anggota Keluarga</label>
                                <input 
                                    id="jumlah_anggota_keluarga"
                                    name="jumlah_anggota_keluarga"
                                    type="text" 
                                    class="form-control">
                            </div>
                            <!-- end::jumlah-anggota-keluarga -->
                            <!-- begin::telepon -->
                            <div class="form-group">
                                <label for="telepon">No Telepon</label>
                                <input 
                                    id="telepon"
                                    name="telepon"
                                    type="text" 
                                    class="form-control">
                            </div>
                            <!-- end::telepon -->
                            <!-- begin::nik-detail-f101 -->
                            <div class="mb-2" id="nik_detail_f101">
                            </div>
                            <!-- end::nik-detail-f101 -->
                            <div class="row">
                                <div class="col text-left">
                                    <button class="btn btn-secondary" id="opener"><i class="flaticon2-add"></i> Tambah Anggota Keluarga</button>
                                </div>
                                <div class="col text-right">
                                    <button style="display: none;" type="submit" class="btn btn-primary" id="btn-submit" >Kirim <i class="flaticon2-paperplane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let detail_f101 = [];
    const f101 = document.getElementById('f101');
    const submitButton = $('#btn-submit');
    const fv = FormValidation.formValidation(
        f101,
        {
            fields: {
                nama_kepala_keluarga: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Kepala Keluarga is required'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat is required'
                        }
                    }
                },
                rt: {
                    validators: {
                        notEmpty: {
                            message: 'RT is required'
                        }
                    }
                },
                rw: {
                    validators: {
                        notEmpty: {
                            message: 'RW is required'
                        }
                    }
                },
                telepon: {
                    validators: {
                        notEmpty: {
                            message: 'No Telp is required'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        }
    );
    
    $(document).ready(function() {
        $('.preloader').fadeOut();

        submitButton.click(function(e) {
            e.preventDefault();

            fv.validate().then(function(status) {
                console.log(status);
                console.log(detail_f101);
                if(status === 'Valid') {
                    formData = new FormData(f101);
                    formData.append('detail_f101', JSON.stringify(detail_f101));
                    $.ajax({
                        // url: '<?= base_url('debug') ?>',
                        url: '<?= base_url('desa/pengajuan/penerbitan-kk-baru/store') ?>',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data)
                            bootbox.alert('Pengajuan KK berhasil disimpan', function() {
                                window.location = '<?= base_url('desa/pengajuan') ?>'
                            })
                        },
                        error: function(error) {
                            console.log(error.responseText)
                        }
                    })
                }
            })
        })
    })

    $('#opener').click(function(e) {
        e.preventDefault();

        window.open('<?= base_url('desa/pengajuan/penerbitan-kk-baru/detail-f101') ?>');
    })

    $('#nik_detail_f101').on('click', '.btn-delete-detail', function() {
        bootbox.confirm({
            title: "Hapus Data",
            message: 'Yakin hapus data?',
            buttons: {
                cancel: {
                    label: 'Batal'
                },
                confirm: {
                    label: 'Yakin',
                    className: 'btn-danger'
                }
            },
            callback: function(result) {
                if(result) {
                    order = $(this).data('order');
                    detail_f101.splice(order, 1);
                    renderDetainF101();
                    checkDetailF101();
                }
            }
        })
    })

    function checkDetailF101()
    {
        if(detail_f101.length > 0) {
            $('#btn-submit').fadeIn();
        } else {
            $('#btn-submit').fadeOut();
        }
    }

    function setDetail(data) {
        detail_f101.push(data);
        renderDetainF101();
    }

    function appendNikDetailF101(item, index)
    {
        let data = `<div class="d-flex align-items-center mb-10">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-success mr-5">
                            <span class="symbol-label">
                                <img src="<?= base_url('assets/media/svg/avatars/009-boy-4.svg') ?>" class="h-75 align-self-end" alt="" />
                            </span>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Text-->
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">${ item.nama_lengkap }</a>
                            <span class="text-muted">${ item.nomor_penduduk }</span>
                        </div>
                        <!--end::Text-->

                        <div class="btn btn-secondary btn-delete-detail" data-order="${ index }">
                            <i class="flaticon-delete p-0 text-danger"></i>
                        </div>
                    </div>
        `
        $('#nik_detail_f101').append(data)
    }

    function renderDetainF101()
    {
        $('#nik_detail_f101').empty();
        detail_f101.forEach(appendNikDetailF101);
    }

</script>