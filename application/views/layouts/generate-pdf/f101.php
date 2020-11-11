<?php
function print2digit($angka, $colspan=1)
{
    if($angka < 10) {
        $teks = "<td colspan='$colspan' class='center'>0</td><td colspan='$colspan' class='center'>$angka</td>";
        return $teks;
    } else {
        $string = (string)$angka;
        $teks = "<td colspan='$colspan' class='center'>{$string[0]}</td><td colspan='$colspan' class='center'>{$string[1]}</td>";
        return $teks;
    }
}

function print4digit($angka)
{
    $string = (string)$angka;
    $teks = "<td class='center'>{$string[0]}</td><td class='center'>{$string[1]}</td><td class='center'>{$string[2]}</td><td class='center'>{$string[3]}</td>";
    return $teks;
}

function selected($index, $length, $colspan=1)
{
    $teks = [];
    $range = range(1, $length);
    foreach($range as $data) {
        if($data == $index) {
            array_push($teks, "<td colspan='$colspan' class='midcen table-secondary'>$data</td>");
        } else {
            array_push($teks, "<td colspan='$colspan' class='midcen'>$data</td>");
        }
    }
    return $teks;
}

function get_filler($start)
{
    if($start > 10) {
        return [];
    }
    return range($start, 10);
}

function check_null($field)
{
    if($field == NULL) {
        return '-';
    }
    return $field;
}

function check_null_date($date)
{
    if($date == NULL) {
        return '-';
    }
    return format_date($date);
}

function format_date($date)
{
    $dt = new DateTime();
    $new_date = $dt->createFromFormat('Y-m-d', $date);
    return $new_date->format('d-m-Y');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=3000px, initial-scale=1.0">
    <title>F-1.01</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/generate-f101.css') ?>">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
</head>

<body>
    <!-- <input type="button" id="create_pdf" value="Generate PDF"> -->
    <form class="form" style="width: 3000px;">
        <div class="container-fluid py-5">
            <h2 class="center">KOP PEMERINTAH KABUPATEN/KOTA</h2>
            <h2 class="center">FORMULIR BIODATA PENDUDUK WARGA NEGARA INDONESIA</h2>
            <table class="table table-sm table-bordered">
                <tr>
                    <td colspan="64"><strong>DATA KEPALA KELUARGA</strong></td>
                    <td colspan="13">Kode-Nama Propinsi</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::kode-provinsi -->
                    <?= print2digit($data_f101['NO_PROP']) ?>
                    <!-- end::kode-provinsi -->
                    <td colspan="2" class="block"></td>
                    <td colspan="39"></td>
                </tr>
                <!-- begin::head -->
                <tr>
                    <td colspan="8">Nama Kepala Keluarga</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::nama-kepala-keluarga -->
                    <td colspan="55"><?= $data_f101['f101_nama_kepala_keluarga'] ?></td>
                    <!-- end::nama-kepala-keluarga -->
                    <td colspan="13">Kode-Nama Kabupaten</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::kode-kabupaten -->
                    <?= print2digit($data_f101['NO_KAB']) ?>
                    <!-- end::kode-kabupaten -->
                    <td colspan="2" class="block"></td>
                    <td colspan="39"></td>
                </tr>
                <tr>
                    <td colspan="8">Alamat</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::alamat -->
                    <td colspan="55"><?= $data_f101['f101_alamat'] ?></td>
                    <!-- end::alamat -->
                    <td colspan="13">Kode-Nama Kecamatan/Distrik</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::kode-kecamatan -->
                    <?= print2digit($data_f101['NO_KEC']) ?>
                    <!-- end::kode-kecamatan -->
                    <td colspan="2" class="block"></td>
                    <td colspan="39"></td>
                </tr>
                <tr>
                    <td colspan="8">Kode Pos</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::kode-pos -->
                    <td colspan="7"><?= $data_f101['KODE_POS'] ?></td>
                    <!-- end::kode-pos -->
                    <td class="block"></td>
                    <td colspan="2" class="center">RT :</td>
                    <!-- begin::rt -->
                    <td colspan="4"><?= $data_f101['f101_rt'] ?></td>
                    <!-- begin::rt -->
                    <td class="block"></td>
                    <td colspan="2" class="center">RW :</td>
                    <!-- begin::rw -->
                    <td colspan="4"><?= $data_f101['f101_rw'] ?></td>
                    <!-- begin::rw -->
                    <td class="block"></td>
                    <td colspan="10" class="center">Jumlah Anggota Keluarga :</td>
                    <!-- begin::jumlah-anggota-keluarga -->
                    <td colspan="4"><?= $data_f101['f101_jumlah_anggota_keluarga'] ?></td>
                    <!-- end::jumlah-anggota-keluarga -->
                    <td colspan="19"></td>
                    <td colspan="13">Kode-Nama Kelurahan/Desa/Sebutan lain</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::kode-kelurahan -->
                    <?= print4digit($data_f101['NO_KEL']) ?>
                    <!-- end::kode-kelurahan -->
                    <td colspan="39"></td>
                </tr>
                <tr>
                    <td colspan="8" class="middle">Telepon</td>
                    <td colspan="1" class="center">:</td>
                    <!-- begin::telepon -->
                    <td colspan="55"><?= $data_f101['f101_telepon'] ?></td>
                    <!-- end::telepon -->
                    <td colspan="13">Nama Dusun/Dukuh/Kampung/Sebutan lain</td>
                    <td colspan="1" class="center">:</td>
                    <td colspan="43"></td>
                </tr>
                <!-- end::head -->
                <tr class="break">
                    <td class="block" colspan="121"></td>
                </tr>
                <!-- begin::atas -->
                <tr>
                    <td colspan="121"><strong>DATA KELUARGA</strong></td>
                </tr>
                <tr>
                    <td class="midcen">No</td>
                    <td colspan="42" class="midcen">Nama Lengkap</td>
                    <td colspan="3" class="midcen">Gelar</td>
                    <td colspan="20" class="midcen">Nomor KTP/Nopen</td>
                    <td colspan="20" class="midcen">Alamat Sebelumnya</td>
                    <td colspan="20" class="midcen">Nomor Paspor</td>
                    <td colspan="15" class="midcen">Tanggal Berakhir Paspor</td>
                </tr>
                <tr class="table-secondary">
                    <td class="midcen">1</td>
                    <td colspan="42" class="midcen">2</td>
                    <td colspan="3" class="midcen">3</td>
                    <td colspan="20" class="midcen">4</td>
                    <td colspan="20" class="midcen">5</td>
                    <td colspan="20" class="midcen">6</td>
                    <td colspan="15" class="midcen">7</td>
                </tr>
                <!-- begin::content-atas -->
                <?php foreach($data_detail_f101 as $key => $data_detail): ?>
                    <tr>
                        <td class="midcen"><?= $key+1 ?></td>
                        <td colspan="42" class="middle"><?= $data_detail['detail_f101_nama_lengkap'] ?></td>
                        <!-- begin::gelar -->
                        <?php 
                            $gelar = selected($data_detail['detail_f101_gelar_id'],3);
                            foreach($gelar as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::gelar -->
                        <td colspan="20" class="middle"><?= $data_detail['detail_f101_nomor_penduduk'] ?></td>
                        <td colspan="20" class="middle"><?= $data_detail['detail_f101_alamat_sebelumnya'] ?></td>
                        <!-- begin::nomor-paspor -->
                        <td colspan="20" class="midcen"><?= check_null($data_detail['detail_f101_nomor_paspor']) ?></td>
                        <!-- end::nomor-paspor -->
                        <td colspan="15" class="midcen"><?= check_null_date($data_detail['detail_f101_tanggal_berakhir_paspor']) ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- end::content-atas -->
                <!-- begin::filler-atas -->
                <?php $fillers = get_filler(count($data_detail_f101) + 1); ?>
                <?php foreach($fillers as $filler): ?>
                    <tr>
                        <td class="midcen"><?= $filler ?></td>
                        <td colspan="42" class="middle"></td>
                        <!-- begin::gelar -->
                        <td colspan='1' class='midcen'>1</td>
                        <td colspan='1' class='midcen'>2</td>
                        <td colspan='1' class='midcen'>3</td>
                        <!-- end::gelar -->
                        <td colspan="20" class="middle"></td>
                        <td colspan="20" class="middle"></td>
                        <td colspan="20" class="middle"></td>
                        <td colspan="15" class="middle"></td>
                    </tr>
                <?php endforeach; ?>
                <!-- end::filler-atas -->
                <!-- end::atas -->
                <!-- begin::break -->
                <tr class="break">
                    <td colspan="121"></td>
                </tr>
                <!-- end::break -->
                <!-- begin::tengah -->
                <tr>
                    <td class="midcen">No</td>
                    <td class="midcen" colspan="4">Jenis Kelamin</td>
                    <td class="midcen" colspan="28">Tempat Lahir</td>
                    <td class="midcen" colspan="8">Tanggal/Bulan/Tahun Lahir</td>
                    <td class="midcen" colspan="3">Umur (tahun)</td>
                    <td class="midcen" colspan="4">Akte Lahir/Surat Lahir</td>
                    <td class="midcen" colspan="8">Nomor Akta Kelahiran/Surat Kenal Lahir</td>
                    <td class="midcen" colspan="4">Golongan Darah</td>
                    <td class="midcen" colspan="7">Agama/Kepercayaan Terhadap Tuhan</td>
                    <td class="midcen" colspan="9">Kepercayaan Terhadap Tuhan Maha Esa</td>
                    <td class="midcen" colspan="4">Status Perkawinan</td>
                    <td class="midcen" colspan="4">Akta Perkawinan/ Buku Nikah</td>
                    <td class="midcen" colspan="9">Nomor Akta Perkawinan/Buku Nikah</td>
                    <td class="midcen" colspan="8">Tanggal Perkawinan</td>
                    <td class="midcen" colspan="4">Akte Cerai/Surat Cerai</td>
                    <td class="midcen" colspan="8">Nomor Akta Perceraian/Surat Cerai</td>
                    <td class="midcen" colspan="8">Tanggal Perceraian</td>
                </tr>
                <tr class="table-secondary">
                    <td class="midcen"></td>
                    <td class="midcen" colspan="4">8</td>
                    <td class="midcen" colspan="28">9</td>
                    <td class="midcen" colspan="8">10</td>
                    <td class="midcen" colspan="3">11</td>
                    <td class="midcen" colspan="4">12</td>
                    <td class="midcen" colspan="8">13</td>
                    <td class="midcen" colspan="4">14</td>
                    <td class="midcen" colspan="7">15</td>
                    <td class="midcen" colspan="9">16</td>
                    <td class="midcen" colspan="4">17</td>
                    <td class="midcen" colspan="4">18</td>
                    <td class="midcen" colspan="9">19</td>
                    <td class="midcen" colspan="8">20</td>
                    <td class="midcen" colspan="4">21</td>
                    <td class="midcen" colspan="8">22</td>
                    <td class="midcen" colspan="8">23</td>
                </tr>
                <!-- begin::content-tengah -->
                <?php foreach($data_detail_f101 as $key => $data_detail): ?>
                    <tr>
                        <td class="midcen"><?= $key+1 ?></td>
                        <!-- begin::jenis-kelamin -->
                        <?php 
                            $kelamin = selected($data_detail['detail_f101_kelamin_id'],2, 2);
                            foreach($kelamin as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::jenis-kelamin -->
                        <td class="midcen" colspan="28"><?= $data_detail['detail_f101_tempat_lahir'] ?></td>
                        <td class="midcen" colspan="8"><?= format_date($data_detail['detail_f101_tanggal_lahir']) ?></td>
                        <td class="midcen" colspan="3"><?= $data_detail['detail_f101_umur'] ?></td>
                        <!-- begin::akta-lahir -->
                        <?php 
                            $akta_lahir = selected($data_detail['detail_f101_akta_lahir_id'],2, 2);
                            foreach($akta_lahir as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::akta-lahir -->
                        <td class="midcen" colspan="8"><?= check_null($data_detail['detail_f101_nomor_akta_kelahiran']) ?></td>
                        <!-- begin::golongan-darah -->
                        <?= print2digit($data_detail['detail_f101_goldar_id'], 2)  ?>
                        <!-- end::golongan-darah -->
                        <!-- begin::agama -->
                        <?php 
                            $agama = selected($data_detail['detail_f101_agama_id'],7);
                            foreach($agama as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::agama -->
                        <!-- begin::kepercayaan-terhadap-tuhan-yme -->
                        <td class="midcen" colspan="9"><?= check_null($data_detail['detail_f101_kepercayaan_terhadap_tuhan_yme']) ?></td>
                        <!-- end::kepercayaan-terhadap-tuhan-yme -->
                        <!-- begin::status-perkawinan -->
                        <?php 
                            $kawin = selected($data_detail['detail_f101_kawin_id'],4);
                            foreach($kawin as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::status-perkawinan -->
                        <!-- begin::akta-perkawinan -->
                        <?php 
                            $akta_perkawinan = selected($data_detail['detail_f101_akta_perkawinan_id'],2, 2);
                            foreach($akta_perkawinan as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::akta-perkawinan -->
                        <td class="midcen" colspan="9"><?= check_null($data_detail['detail_f101_nomor_akta_perkawinan']) ?></td>
                        <td class="midcen" colspan="8"><?= check_null_date($data_detail['detail_f101_tanggal_perkawinan']) ?></td>
                        <!-- begin::akta-cerai -->
                        <?php 
                            $akta_cerai = selected($data_detail['detail_f101_akta_cerai_id'],2, 2);
                            foreach($akta_cerai as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::akta-cerai -->
                        <td class="midcen" colspan="8"><?= check_null($data_detail['detail_f101_nomor_akta_perceraian']) ?></td>
                        <td class="midcen" colspan="8"><?= check_null_date($data_detail['detail_f101_tanggal_perceraian']) ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- end::content-tangah -->
                <!-- begin::filler-tengah -->
                <?php $fillers = get_filler(count($data_detail_f101) + 1); ?>
                <?php foreach($fillers as $filler): ?>
                    <tr>
                        <td class="midcen"><?= $filler ?></td>
                        <!-- begin::jenis-kelamin -->
                        <td class="midcen" colspan="2">1</td>
                        <td class="midcen" colspan="2">2</td>
                        <!-- end::jenis-kelamin -->
                        <td class="midcen" colspan="28"></td>
                        <td class="midcen" colspan="8"></td>
                        <td class="midcen" colspan="3"></td>
                        <!-- begin::akta-lahir -->
                        <td class="midcen" colspan="2">1</td>
                        <td class="midcen" colspan="2">2</td>
                        <!-- end::akta-lahir -->
                        <td class="midcen" colspan="8"></td>
                        <!-- begin::golongan-darah -->
                        <td class="midcen" colspan="2"></td>
                        <td class="midcen" colspan="2"></td>
                        <!-- end::golongan-darah -->
                        <!-- begin::agama -->
                        <td class="midcen" colspan="1">1</td>
                        <td class="midcen" colspan="1">2</td>
                        <td class="midcen" colspan="1">3</td>
                        <td class="midcen" colspan="1">4</td>
                        <td class="midcen" colspan="1">5</td>
                        <td class="midcen" colspan="1">6</td>
                        <td class="midcen" colspan="1">7</td>
                        <!-- end::agama -->
                        <td class="midcen" colspan="9"></td>
                        <!-- begin::status-perkawinan -->
                        <td class="midcen" colspan="1">1</td>
                        <td class="midcen" colspan="1">2</td>
                        <td class="midcen" colspan="1">3</td>
                        <td class="midcen" colspan="1">4</td>
                        <!-- end::status-perkawinan -->
                        <!-- begin::akta-perkawinan -->
                        <td class="midcen" colspan="2">1</td>
                        <td class="midcen" colspan="2">2</td>
                        <!-- end::akta-perkawinan -->
                        <td class="midcen" colspan="9"></td>
                        <td class="midcen" colspan="8"></td>
                        <!-- begin::akta-cerai -->
                        <td class="midcen" colspan="2">1</td>
                        <td class="midcen" colspan="2">2</td>
                        <!-- end::akta-cerai -->
                        <td class="midcen" colspan="8"></td>
                        <td class="midcen" colspan="8"></td>
                    </tr>
                <?php endforeach; ?>
                <!-- end::filler-tengah -->
                <!-- end::tengah -->
                <!-- begin::break -->
                <tr class="break">
                    <td colspan="121"></td>
                </tr>
                <!-- end::break -->
                <!-- begin::bawah -->
                <tr>
                    <td class="midcen">No</td>
                    <td class="midcen" colspan="4">Status Hub. Dlm. Keluarga</td>
                    <td class="midcen" colspan="4">Kelainan Fisik &amp; Mental</td>
                    <td class="midcen" colspan="12">Penyandang Cacat</td>
                    <td class="midcen" colspan="20">Pendidikan Terakhir</td>
                    <td class="midcen" colspan="4">Pekerjaan</td>
                    <td class="midcen" colspan="16">NIK Ibu</td>
                    <td class="midcen" colspan="21">Nama lengkap Ibu</td>
                    <td class="midcen" colspan="16">NIK Ayah</td>
                    <td class="midcen" colspan="23">Nama Lengkap Ayah</td>
                </tr>
                <tr class="table-secondary">
                    <td class="midcen"></td>
                    <td class="midcen" colspan="4">24</td>
                    <td class="midcen" colspan="4">25</td>
                    <td class="midcen" colspan="12">26</td>
                    <td class="midcen" colspan="20">27</td>
                    <td class="midcen" colspan="4">28</td>
                    <td class="midcen" colspan="16">29</td>
                    <td class="midcen" colspan="21">30</td>
                    <td class="midcen" colspan="16">31</td>
                    <td class="midcen" colspan="23">32</td>
                </tr>
                <!-- begin::content-bawah -->
                <?php foreach($data_detail_f101 as $key => $data_detail): ?>
                    <tr>
                        <td class="midcen"><?= $key+1 ?></td>
                        <!-- begin::hub-kel -->
                        <?= print2digit($data_detail['detail_f101_hubkel_id'], 2) ?>
                        <!-- end::hub-kel -->
                        <!-- begin::kelainan -->
                        <?php 
                            $kelainan = selected($data_detail['detail_f101_kelainan_id'],2, 2);
                            foreach($kelainan as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::kelainan -->
                        <!-- begin::cacat -->
                        <?php 
                            $cacat = selected($data_detail['detail_f101_cacat_id'],6, 2);
                            foreach($cacat as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::cacat -->
                        <!-- begin::pendidikan -->
                        <?php 
                            $pendidikan = selected($data_detail['detail_f101_pendidikan'],10, 2);
                            foreach($pendidikan as $string) {
                                echo $string;
                            } 
                        ?>
                        <!-- end::pendidikan -->
                        <!-- begin::pekerjaan -->
                        <?= print2digit($data_detail['detail_f101_pekerjaan'], 2) ?>
                        <!-- end::pekerjaan -->
                        <td class="midcen" colspan="16"><?= $data_detail['detail_f101_nik_ibu'] ?></td>
                        <td class="midcen" colspan="21"><?= $data_detail['detail_f101_nama_lengkap_ibu'] ?></td>
                        <td class="midcen" colspan="16"><?= $data_detail['detail_f101_nik_ayah'] ?></td>
                        <td class="midcen" colspan="23"><?= $data_detail['detail_f101_nama_lengkap_ayah'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- end::content-bawah -->
                <!-- begin::filler-bawah -->
                <?php $fillers = get_filler(count($data_detail_f101) + 1); ?>
                <?php foreach($fillers as $filler): ?>
                    <tr>
                        <td class="midcen"><?= $filler ?></td>
                        <!-- begin::hub-kel -->
                        <td class="midcen" colspan="2"></td>
                        <td class="midcen" colspan="2"></td>
                        <!-- end::hub-kel -->
                        <!-- begin::kelainan -->
                        <td class="midcen" colspan="2">1</td>
                        <td class="midcen" colspan="2">2</td>
                        <!-- end::kelainan -->
                        <!-- begin::cacat -->
                        <td class="midcen" colspan="2">1</td>
                        <td class="midcen" colspan="2">2</td>
                        <td class="midcen" colspan="2">3</td>
                        <td class="midcen" colspan="2">4</td>
                        <td class="midcen" colspan="2">5</td>
                        <td class="midcen" colspan="2">6</td>
                        <!-- end::cacat -->
                        <!-- begin::pendidikan -->
                        <td class="midcen" colspan="2">1</td>
                        <td class="midcen" colspan="2">2</td>
                        <td class="midcen" colspan="2">3</td>
                        <td class="midcen" colspan="2">4</td>
                        <td class="midcen" colspan="2">5</td>
                        <td class="midcen" colspan="2">6</td>
                        <td class="midcen" colspan="2">7</td>
                        <td class="midcen" colspan="2">8</td>
                        <td class="midcen" colspan="2">9</td>
                        <td class="midcen" colspan="2">10</td>
                        <!-- end::pendidikan -->
                        <!-- begin::pekerjaan -->
                        <td class="midcen" colspan="2"></td>
                        <td class="midcen" colspan="2"></td>
                        <!-- end::pekerjaan -->
                        <td class="midcen" colspan="16"></td>
                        <td class="midcen" colspan="21"></td>
                        <td class="midcen" colspan="16"></td>
                        <td class="midcen" colspan="23"></td>
                    </tr>
                <?php endforeach; ?>
                <!-- end::filler-bawah -->
                <!-- end::bawah -->
            </table>
        </div>
        <br>
        <!-- begin::ttd -->
        <div class="container-fluid">
        <table class="table-borderless">
            <tr>
                <td colspan="3">Nama Ketua RT : </td>
                <td class="midcen" colspan="1"></td>
                <td colspan="17"></td>
                <td colspan="8"></td>
                <td colspan="4"></td>
                <td colspan="7"></td>
                <td style="text-align: right" colspan="6">20 Agustus 2020</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="18"></td>
                <td class="midcen" colspan="20">Mengetahui,</td>
                <td class="midcen" colspan="5">Kepala Keluarga,</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="18"></td>
                <td class="midcen" colspan="7">Kepala Dinas Kependudukan dan Pencatatan Sipil Kabupaten/Kota................**)</td>
                <td class="midcen" colspan="7">Camat/Kepala Distrik.............</td>
                <td class="midcen" colspan="6">Kepala Desa/Lurah/Sebutan lain............</td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="3">Nama Ketua RW : </td>
                <td class="midcen" colspan="1"></td>
                <td colspan="17"></td>
                <td colspan="8"></td>
                <td colspan="4"></td>
                <td colspan="7"></td>
                <td></td>
                <td class="midcen" colspan="5" rowspan="3">Ttd / cap Jempol</td>
            </tr>
            <tr>
                <td colspan="41"><p></p></td>
            </tr>
            <tr>
                <td colspan="41"><p></p></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="18"></td>
                <td colspan="7">Nama Lengkap :</td>
                <td colspan="7">Nama Lengkap :</td>
                <td colspan="6">Nama Lengkap :</td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="18"></td>
                <td colspan="7">NIP :</td>
                <td colspan="7">NIP :</td>
                <td colspan="6">NIP :</td>
                <td colspan="5">Nama Jelas :</td>
            </tr>
            <tr>
                <td colspan="3">PERNYATAAN</td>
                <td colspan="18"></td>
                <td colspan="8"></td>
                <td colspan="4"></td>
                <td colspan="7"></td>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="21">Demikian Formulir ini saya/kami isi dengan sesungguhnya apabila keterangan tersebut tidak
                    sesuai dengan</td>
                <td colspan="8"></td>
                <td colspan="4"></td>
                <td colspan="7"></td>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="21">keadaan sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan peraturan
                    perundang-undangan yang berlaku</td>
                <td colspan="8"></td>
                <td colspan="4"></td>
                <td colspan="7"></td>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="21">Catatan : *) Hanya diisi oleh salah satu pasangan keluarga tersebut (suami/istri)</td>
                <td colspan="8"></td>
                <td colspan="4"></td>
                <td colspan="7"></td>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="28">**) Hanya ditandatangani oleh Kepala Dinas Kependudukan dan Pencatatan Sipil
                    Kabupaten/Kota,
                    apabila pencatatan biodata dilakukan oleh WNI yang datang dari luar negeri</td>
                <td colspan="4"></td>
                <td colspan="7"></td>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        </div>
        <!-- end::ttd -->
    </form>
</body>

</html>
<script>
    var
        form = $('.form'),
        cache_width = form.width(),
    //  a4 = [841.89, 595.28]; // for a4 size paper width and height
        a3 = [3000, 2121]; // for a4 size paper width and height

    //create pdf
    function createPDF() {
        getCanvas().then(function (canvas) {
            var
                img = canvas.toDataURL("image/png"),
                doc = new jsPDF({
                    orientation: 'landscape',
                    unit: 'px',
                    format: [1800, 1272.5]
                });
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('f101.pdf');
            form.width(cache_width);
        });
    }

    // create canvas object
    function getCanvas() {
        form.width((a3[0] * 1.33333) - 80).css('max-width', 'none');
        return html2canvas(form, {
            imageTimeout: 2000,
            removeContainer: true
        });
    }
    $(document).ready(function() {
        $('body').scrollTop(0);
        createPDF();
    })
    // (function () {
    //     var
    //      form = $('.form'),
    //      cache_width = form.width(),
    //     //  a4 = [841.89, 595.28]; // for a4 size paper width and height
    //      a3 = [3000, 2121]; // for a4 size paper width and height

    //     $('#create_pdf').on('click', function () {
    //         $('body').scrollTop(0);
    //         createPDF();
    //     });
    //     //create pdf
    //     function createPDF() {
    //         getCanvas().then(function (canvas) {
    //             var
    //              img = canvas.toDataURL("image/png"),
    //              doc = new jsPDF({
    //                  orientation: 'landscape',
    //                  unit: 'px',
    //                  format: [1800, 1272.5]
    //              });
    //             doc.addImage(img, 'JPEG', 20, 20);
    //             doc.save('f101.pdf');
    //             form.width(cache_width);
    //         });
    //     }

    //     // create canvas object
    //     function getCanvas() {
    //         form.width((a3[0] * 1.33333) - 80).css('max-width', 'none');
    //         return html2canvas(form, {
    //             imageTimeout: 2000,
    //             removeContainer: true
    //         });
    //     }

    // }());
</script>
<script>
    (function ($) {
        $.fn.html2canvas = function (options) {
            var date = new Date(),
            $message = null,
            timeoutTimer = false,
            timer = date.getTime();
            html2canvas.logging = options && options.logging;
            html2canvas.Preload(this[0], $.extend({
                complete: function (images) {
                    var queue = html2canvas.Parse(this[0], images, options),
                    $canvas = $(html2canvas.Renderer(queue, options)),
                    finishTime = new Date();

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                    $canvas.siblings().toggle();

                    $(window).click(function () {
                        if (!$canvas.is(':visible')) {
                            $canvas.toggle().siblings().toggle();
                            throwMessage("Canvas Render visible");
                        } else {
                            $canvas.siblings().toggle();
                            $canvas.toggle();
                            throwMessage("Canvas Render hidden");
                        }
                    });
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                }
            }, options));

            function throwMessage(msg, duration) {
                window.clearTimeout(timeoutTimer);
                timeoutTimer = window.setTimeout(function () {
                    $message.fadeOut(function () {
                        $message.remove();
                    });
                }, duration || 2000);
                if ($message)
                    $message.remove();
                $message = $('<div ></div>').html(msg).css({
                    margin: 0,
                    padding: 10,
                    background: "#000",
                    opacity: 0.7,
                    position: "fixed",
                    top: 10,
                    right: 10,
                    fontFamily: 'Tahoma',
                    color: '#fff',
                    fontSize: 12,
                    borderRadius: 12,
                    width: 'auto',
                    height: 'auto',
                    textAlign: 'center',
                    textDecoration: 'none'
                }).hide().fadeIn().appendTo('body');
            }
        };
    })(jQuery);
</script>