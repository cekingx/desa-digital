<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Sekretaris Desa</h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Nama Sekdes</td>
                            <td><?= $identitas_desa->NAMA_SEKDES ?></td>
                        </tr>
                        <tr>
                            <td style="width: 40%; vertical-align: middle;">Foto Sekdes</td>
                            <td style="width: 60%; text-align: center"><img class="img-fluid" style="max-width: 200px;"
                                    src="<?= base_url('storage/desa/') . $identitas_desa->NAMA_KEL . '/foto' . '/' . $identitas_desa->FOTO_SEKDES ?>"
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