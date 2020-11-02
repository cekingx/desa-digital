<title><?= $title ?></title>

<div class="d-flex flex-column-row">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Buat Pengajuan</h3>
                </div> 
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-xxl-7">
                        <?= form_open_multipart('#', 'id="upload"') ?>
                            <!-- begin::nik -->
                            <div class="form-group">
                                <label for="nik">NIK Pemohon</label>
                                <input 
                                    type="text" 
                                    class="form-control"
                                    id="nik"
                                    name="nik">
                            </div>
                            <!-- end::nik -->
                            <!-- begin::button -->
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                            <!-- end::button -->
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();
    $('#upload').submit(function(e) {
        e.preventDefault();
        $('.preloader').fadeIn();

        $.ajax({
            url: '<?= base_url('desa/pengajuan/data-masyarakat') ?>',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
                $('.preloader').fadeOut();
                bootbox.confirm({
                    title: "Buat pengajuan",
                    message: "Untuk " + data.NAMA_LGKP + " dari desa " + data.NAMA_KEL_EKTP,
                    buttons: {
                        cancel: {
                            label: 'Batal'
                        },
                        confirm: {
                            label: 'Benar',
                            className: 'btn-primary'
                        }
                    },
                    callback: function(result) {
                        if(result) {
                            $('.preloader').fadeIn();
                            setNik(data.NIK);
                        }
                    }
                })
            },
            error: function(error) {
                // console.log(error);
                bootbox.alert('Data yang anda input tidak ditemukan');
            }
        });
    });

    function setNik(nik) {
        formdata = new FormData();
        formdata.append('nik', nik);

        $.ajax({
            url: '<?= base_url('desa/pengajuan/set-nik-to-session') ?>',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log(data);
                window.location = '<?= base_url('desa/pengajuan/pilih-layanan') ?>';
            },
            error: function(error) {
                // console.log(error)
                bootbox.alert('Terjadi error pada server');
            }
        });
    }
</script>