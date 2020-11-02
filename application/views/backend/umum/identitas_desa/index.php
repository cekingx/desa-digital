<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Identitas Desa</h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <tbody>
                        <tr>
                            <td style="width: 40%; vertical-align: middle;">Logo</td>
                            <td style="width: 60%; text-align: center"><img class="img-fluid" style="max-width: 200px;"
                                    src="<?= base_url('storage/desa/') . $identitas_desa->NAMA_KEL . '/logo' . '/' . $identitas_desa->LOGO ?>"
                                    alt=""></td>
                        </tr>
                        <tr>
                            <td>Alamat Kantor</td>
                            <td><?= $identitas_desa->ALAMAT_KANTOR ?></td>
                        </tr>
                        <tr>
                            <td>Telp. Desa</td>
                            <td><?= $identitas_desa->TELP_DESA ?></td>
                        </tr>
                        <tr>
                            <td>Sejarah</td>
                            <td><?= $identitas_desa->SEJARAH ?></td>
                        </tr>
                        <tr>
                            <td>Visi</td>
                            <td><?= $identitas_desa->VISI ?></td>
                        </tr>
                        <tr>
                            <td>Misi</td>
                            <td><?= $identitas_desa->MISI ?></td>
                        </tr>
                        <tr>
                            <td>Koordinat</td>
                            <td>(<?= $identitas_desa->LATITUDE ?>, <?= $identitas_desa->LONGITUDE ?>)</td>
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