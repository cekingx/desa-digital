<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Edit Sekretaris Desa</h3>
                </div>
            </div>
            <div class="card-body">
                <?= form_open_multipart('desa/identitas-desa/sekdes/update', 'id="upload"'); ?>
                    <!-- begin::id -->
                    <input type="hidden" name="id" value="<?= $identitas_desa->id ?>">
                    <!-- end::id -->
                    <!-- begin::old-foto -->
                    <input type="hidden" name="old_foto_sekdes" value="<?= $identitas_desa->FOTO_SEKDES ?>">
                    <!-- end::old-foto -->
                    <!-- begin::nama-sekdes -->
                    <div class="form-group">
                        <label for="nama_sekdes">Nama Sekdes</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="nama_sekdes" 
                            name="nama_sekdes" 
                            value="<?= $identitas_desa->NAMA_SEKDES ?>"
                        >
                        <span style="display: none;" class="text-danger" id="need-nama">
                            Nama masih kosong
                        </span>
                    </div>
                    <!-- end::nama-sekdes -->
                    <!-- begin::foto-sekdes -->
                    <div class="form-group">
                        <label for="foto_sekdes">Foto Sekdes</label> 
                        <input 
                            type="file" 
                            class="form-control" 
                            id="foto_sekdes" 
                            name="foto_sekdes" 
                        >
                    </div>
                    <!-- end::foto-sekdes -->
                    <button type="submit" class="btn btn-success">Submit</button>
                <?= form_close();  ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();
</script>