<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Edit Kepala Desa</h3>
                </div>
            </div>
            <div class="card-body">
                <?= form_open_multipart('desa/identitas-desa/kades/update', 'id="upload"'); ?>
                    <!-- begin::id -->
                    <input type="hidden" name="id" value="<?= $identitas_desa->id ?>">
                    <!-- end::id -->
                    <!-- begin::old-foto -->
                    <input type="hidden" name="old_foto_kades" value="<?= $identitas_desa->FOTO_KADES ?>">
                    <!-- end::old-foto -->
                    <!-- begin::nama-kades -->
                    <div class="form-group">
                        <label for="nama_kades">Nama Kades</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="nama_kades" 
                            name="nama_kades" 
                            value="<?= $identitas_desa->NAMA_KADES ?>"
                        >
                        <span style="display: none;" class="text-danger" id="need-nama">
                            Nama masih kosong
                        </span>
                    </div>
                    <!-- end::nama-kades -->
                    <!-- begin::foto-kades -->
                    <div class="form-group">
                        <label for="foto_kades">Foto Kades</label> 
                        <input 
                            type="file" 
                            class="form-control" 
                            id="foto_kades" 
                            name="foto_kades" 
                        >
                    </div>
                    <!-- end::foto-kades -->
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <?= form_close();  ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();
    // $('#upload').submit(function(e) {
    //     e.preventDefault();

    //     let request = new FormData(this);
    //     $.ajax({
    //         url: '<?= base_url('desa/identitas_desa/kades/update') ?>',
    //         data: request,
    //         type: 'POST',
    //         processData: false,
    //         contentType: false,
    //         success: function(data) {
    //             console.log(data)
    //         }
    //     });
    // })
</script>