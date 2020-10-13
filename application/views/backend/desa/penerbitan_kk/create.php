<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        f101
                    </h3>
                </div>
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
                            <button class="btn btn-secondary" id="opener">Tambah Data</button>
                            <button type="submit" class="btn btn-primary" id="btn-submit" >Submit</button>
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

        window.open('<?= base_url('desa/pengajuan/detail-f101-v2') ?>', '_blank');
    })

    function setDetail(data) {
        detail_f101.push(data);
    }
</script>