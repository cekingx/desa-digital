<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Edit Identitas Desa</h3>
                </div>
            </div>
            <div class="card-body">
                <?= form_open_multipart('desa/identitas-desa/update', 'id="upload"'); ?>
                    <!-- begin::id -->
                    <input type="hidden" name="id" value="<?= $identitas_desa->id ?>">
                    <!-- end::id -->
                    <!-- begin::old-foto -->
                    <input type="hidden" name="old_logo" value="<?= $identitas_desa->LOGO ?>">
                    <!-- end::old-foto -->
                    <!-- begin::alamat-kantor -->
                    <div class="form-group">
                        <label for="alamat_kantor">Alamat Kantor</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="alamat_kantor" 
                            name="alamat_kantor" 
                            value="<?= $identitas_desa->ALAMAT_KANTOR ?>"
                        >
                        <span style="display: none;" class="text-danger" id="need-alamat">
                            Alamat masih kosong
                        </span>
                    </div>
                    <!-- end::alamat-kantor -->
                    <!-- begin::telp-desa -->
                    <div class="form-group">
                        <label for="telp_desa">Telp. Desa</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="telp_desa" 
                            name="telp_desa" 
                            value="<?= $identitas_desa->TELP_DESA ?>"
                        >
                        <span style="display: none;" class="text-danger" id="need-telp-desa">
                            Telepon masih kosong
                        </span>
                    </div>
                    <!-- end::telp-desa -->
                    <!-- begin::sejarah -->
                    <div class="form-group">
                        <label for="sejarah">Sejarah</label> 
                        <textarea class="form-control" name="sejarah" id="sejarah" cols="30"
                            rows="10"><?= $identitas_desa->SEJARAH ?></textarea>
                        <span style="display: none;" class="text-danger" id="need-sejarah">
                            Sejarah masih kosong
                        </span>
                    </div>
                    <!-- end::sejarah -->
                    <!-- begin::visi -->
                    <div class="form-group">
                        <label for="visi">Visi</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="visi" 
                            name="visi" 
                            value="<?= $identitas_desa->VISI ?>"
                        >
                        <span style="display: none;" class="text-danger" id="need-visi">
                            Visi masih kosong
                        </span>
                    </div>
                    <!-- end::visi -->
                    <!-- begin::misi -->
                    <div class="form-group">
                        <label for="misi">Misi</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="misi" 
                            name="misi" 
                            value="<?= $identitas_desa->MISI ?>"
                        >
                        <span style="display: none;" class="text-danger" id="need-misi">
                            Misi masih kosong
                        </span>
                    </div>
                    <!-- end::misi -->
                    <!-- begin::logo -->
                    <div class="form-group">
                        <label for="logo">Logo Desa</label> 
                        <input 
                            type="file" 
                            class="form-control" 
                            id="logo" 
                            name="logo" 
                        >
                    </div>
                    <!-- end::logo -->
                    <button type="submit" class="btn btn-success">Submit</button>
                <?= form_close();  ?>
            </div>
        </div>
    </div>
</div>