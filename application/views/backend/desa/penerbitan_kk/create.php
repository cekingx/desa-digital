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
                <form class="form" id="f101">
                    <!-- begin::nama-kepala-keluarga -->
                    <div class="form-group">
                        <label for="f101_nama_kepala_keluarga">Nama Kepala Keluarga</label>
                        <input 
                            id="f101_nama_kepala_keluarga"
                            name="f101_nama_kepala_keluarga"
                            type="text" 
                            class="form-control">
                    </div>
                    <!-- end::nama-kepala-keluarga -->
                    <!-- begin::alamat -->
                    <div class="form-group">
                        <label for="f101_alamat">Alamat</label>
                        <input 
                            id="f101_alamat"
                            name="f101_alamat"
                            type="text" 
                            class="form-control">
                    </div>
                    <!-- end::alamat -->
                    <!-- begin::no-telp -->
                    <div class="form-group">
                        <label for="f101_no_telp">No Telp</label>
                        <input 
                            id="f101_no_telp"
                            name="f101_no_telp"
                            type="text" 
                            class="form-control">
                    </div>
                    <!-- end::no-telp -->
                    <button class="btn btn-secondary" id="opener">Opener</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit" >Submit</button>
                </form>
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
                f101_nama_kepala_keluarga: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Kepala Keluarga is required'
                        }
                    }
                },
                f101_alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat is required'
                        }
                    }
                },
                f101_no_telp: {
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
            })
        })
    })

    $('#opener').click(function(e) {
        e.preventDefault();

        window.open('<?= base_url('desa/pengajuan/detail-f101') ?>', '_blank');
    })

    function setDetail(data) {
        detail_f101.push(data);
    }
</script>