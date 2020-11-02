<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Kepala Desa</h3>
                </div>
                <div class="card-toolbar">
                    <a href="<?= base_url('desa/identitas-desa/kades/edit/') ?>" class="btn btn-icon btn-light-warning mr-2">
                        <i class="flaticon2-edit"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <tbody>
                        <tr>
                            <td>Nama Kades</td>
                            <td><?= $identitas_desa->NAMA_KADES ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%; vertical-align: middle;">Foto Kades</td>
                            <td style="width: 60%; text-align: center"><img class="img-fluid" style="max-width: 200px;"
                                    src="<?= base_url('storage/desa/') . $identitas_desa->NAMA_KEL . '/foto' . '/' . $identitas_desa->FOTO_KADES ?>"
                                    alt=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();
</script>