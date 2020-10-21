<title><? $title ?></title>

<div class="d-flex flex-column-fluid">
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h2 class="card-label">Input berkas pengajuan KTP</h2>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-xxl-7">
                    <form class="form" id="penerbitan-ktp" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Scan KK</label>
                            <input class="form-control" type="file" name="kk" id="kk">
                        </div>
                        <div class="form-group">
                            <label>Surat Pengantar dari Desa/Kelurahan</label>
                            <input class="form-control" type="file" name="surat_pengantar" id="surat_pengantar">
                        </div>
                        <button id="btn-submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    const form_penerbitan_ktp = document.getElementById('penerbitan-ktp');
    const submitButton = $('#btn-submit');
    const fv = FormValidation.formValidation(
        form_penerbitan_ktp,
        {
            fields: {
                kk: {
                    validators: {
                        notEmpty: {
                            message: 'Scan KK tidak boleh kosong'
                        }
                    }
                },
                surat_pengantar: {
                    validators: {
                        notEmpty: {
                            message: 'Surat Pengantar tidak boleh kosong'
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
                if(status == 'Valid') {
                    formData = new FormData(form_penerbitan_ktp);
                    $.ajax({
                        // url: '<?= base_url('debug'); ?>',
                        url: '<?= base_url('desa/pengajuan/penerbitan-ktp-baru/store'); ?>',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data);
                            bootbox.alert('Data berhasil dibuat', function() {
                                window.location = '<?= base_url('desa/pengajuan') ?>'
                            })
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    })
                }
            })
        })
    })
</script>