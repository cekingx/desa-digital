<div class="d-flex flex-column-fluid">
    <div class="container">
        <!--begin::Profile Personal Information-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4" id="sidebar">
                        <!--begin::User-->
                        <div class="d-flex align-items-center mt-4">
                            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                <span class="symbol-label">
                                    <img src="<?= base_url('assets/media/svg/avatars/009-boy-4.svg') ?>" class="h-75 align-self-end" alt="">
                                </span>
                            </div>
                            <div>
                                <a id="nama_kepala_keluarga"
                                    class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                </a>
                                <div id="telepon" class="text-muted">
                                </div>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Alamat:</span>
                                <span class="text-muted" id="alamat"></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">RT/RW:</span>
                                <span class="text-muted" id="rt_rw"></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-weight-bold mr-2">Jumlah Anggota Keluarga:</span>
                                <span class="text-muted" id="jumlah_anggota_keluarga"></span>
                            </div>
                        </div>
                        <!--end::Contact-->
                        
                        <!-- begin::list-nik -->
                        <div class="m-0 p-0" id="nik_detail_f101"></div>
                        <!-- end::list-nik -->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Detail F101</h3>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Form-->
                    <form class="form">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mb-6">1</h5>
                                </div>
                            </div>
                            <!-- begin::nama-lengkap -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama Lengkap</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nama_lengkap"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nama-lengkap -->
                            <!-- begin::gelar -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Gelar</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-gelar"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::gelar -->
                            <!-- begin::nomor-penduduk -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nomor Penduduk</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nomor_penduduk"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nomor-penduduk -->
                            <!-- begin::alamat-sebelumnya -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Alamat Sebelumnya</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-alamat_sebelumnya"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::alamat-sebelumnya -->
                            <!-- begin::kelamin -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kelamin</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-kelamin"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::kelamin -->
                            <!-- begin::tempat-lahir -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Tempat Lahir</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-tempat_lahir"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::tempat-lahir -->
                            <!-- begin::tanggal-lahir -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Tanggal Lahir</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-tanggal_lahir"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::tanggal-lahir -->
                            <!-- begin::umur -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Umur</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-umur"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::umur -->
                            <!-- begin::golongan-darah -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Golongan Darah</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-golongan_darah"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::golongan-darah -->
                            <!-- begin::agama -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Agama</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-agama"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::agama -->
                            <!-- begin::kepemilikan-kelainan -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kepemilikan Kelainan</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-kepemilikan_kelainan"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::kepemilikan-kelainan -->
                            <!-- begin::penyandang-cacat -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Penyandang Cacat</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-penyandang_cacat"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::penyandang-cacat -->
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mt-10 mb-6">2</h5>
                                </div>
                            </div>
                            <!-- begin::nomor-paspor -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nomor Paspor</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nomor_paspor"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nomor-paspor -->
                            <!-- begin::tanggal-berakhir-paspor -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Tanggal Berakhir Paspor</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-tanggal_berakhir_paspor"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::tanggal-berakhir-paspor -->
                            <!-- begin::kepemilikan-akta-lahir -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kepemilikan Akta Lahir</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-kepemilikan_akta_lahir"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::kepemilikan-akta-lahir -->
                            <!-- begin::nomor-akta-kelahiran -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nomor Akta Kelahiran</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nomor_akta_kelahiran"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nomor-akta-kelahiran -->
                            <!-- begin::status-kawin -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Status Kawin</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-status_kawin"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::status-kawin -->
                            <!-- begin::tanggal-perkawinan -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Tanggal Perkawinan</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-tanggal_perkawinan"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::tanggal-perkawinan -->
                            <!-- begin::kepemilikan-akta-perkawinan -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kepemilikan Akta Perkawinan</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-kepemilikan_akta_perkawinan"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::kepemilikan-akta-perkawinan -->
                            <!-- begin::nomor-akta-perkawinan -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nomor Akta Perkawinan</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nomor_akta_perkawinan"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nomor-akta-perkawinan -->
                            <!-- begin::kepemilikan-akta-cerai -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kepemilikan Akta Cerai</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-kepemilikan_akta_cerai"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::kepemilikan-akta-cerai -->
                            <!-- begin::nomor-akta-cerai -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nomor Akta Cerai</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nomor_akta_perceraian"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nomor-akta-cerai -->
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mt-10 mb-6">3</h5>
                                </div>
                            </div>
                            <!-- begin::hubungan-keluarga -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Hubungan Keluarga</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-hubungan_keluarga"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::hubungan-keluarga -->
                            <!-- begin::pendidikan -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Pendidikan</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-pendidikan"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::pendidikan -->
                            <!-- begin::pekerjaan -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Pekerjaan</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-pekerjaan"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::pekerjaan -->
                            <!-- begin::nik-ibu -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">NIK Ibu</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nik_ibu"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nik-ibu -->
                            <!-- begin::nama-lengkap-ibu -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama Lengkap Ibu</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nama_lengkap_ibu"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nama-lengkap-ibu -->
                            <!-- begin::nik-ayah -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">NIK Ayah</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nik_ayah"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nik-ayah -->
                            <!-- begin::nama-lengkap-ayah -->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama Lengkap Ayah</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="data-nama_lengkap_ayah"
                                        class="form-control form-control-lg form-control-solid" disabled="disabled"
                                        type="text" />
                                </div>
                            </div>
                            <!-- end::nama-lengkap-ayah -->
                        </div>
                        <!--end::Body-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Personal Information-->
    </div>
</div>

<script>
const data_f101 = <?= $f101; ?>;

$(document).ready(function() {
    set_initial();
    console.log(data_f101);
});

$('#nik_detail_f101').on('click', '.navi', function(e) {
    e.preventDefault();

    $('.is-active').removeClass('active');
    $(this)
        .children('div')
        .children('a')
        .addClass('active');

    index = $(this).data('order');
    data = get_detail_f101(index);
    // $('#detail_f101_nama').val(data.detail_f101_nama_lengkap);
    renderDetailf101(data);
})

function set_initial()
{
    let data_detail = data_f101.detail_f101[0];

    $('#nama_kepala_keluarga').text(data_f101.f101.f101_nama_kepala_keluarga);
    $('#telepon').text(data_f101.f101.f101_telepon);
    $('#alamat').text(data_f101.f101.f101_alamat);
    $('#rt_rw').text(data_f101.f101.f101_rt + '/' + data_f101.f101.f101_rw);
    $('#jumlah_anggota_keluarga').text(data_f101.f101.f101_jumlah_anggota_keluarga);
    data_f101.detail_f101.forEach(appendNikToSidebar);

    renderDetailf101(data_detail)

}
function appendNikToSidebar(item, index)
{
    let active = index == 0 ? 'active' : '';

    let data = `<div class="navi navi-bold navi-hover navi-active navi-link-rounded" data-order="${ index }">
                    <div class="navi-item mb-2">
                        <a href="#" class="navi-link py-4 is-active ${ active }">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon--></span> </span>
                            <span class="navi-text font-size-lg">
                                ${ item.detail_f101_nomor_penduduk }
                            </span>
                        </a>
                    </div>
                </div>`;

    $('#nik_detail_f101').append(data);
}

function get_detail_f101(index)
{
    data_detail_f101 = data_f101.detail_f101[index];
    return data_detail_f101;
}

function renderDetailf101(data_detail)
{
    // begin::data-detail-f101
    $('#data-nama_lengkap').val(data_detail.detail_f101_nama_lengkap);
    $('#data-gelar').val(data_detail.detail_f101_gelar_id);
    $('#data-nomor_penduduk').val(data_detail.detail_f101_nomor_penduduk);
    $('#data-alamat_sebelumnya').val(data_detail.detail_f101_alamat_sebelumnya);
    $('#data-nomor_paspor').val(data_detail.detail_f101_nomor_paspor);
    
    $('#data-tanggal_berakhir_paspor').val(data_detail.detail_f101_tanggal_berakhir_paspor);
    $('#data-kelamin').val(data_detail.detail_f101_kelamin_id);
    $('#data-tempat_lahir').val(data_detail.detail_f101_tempat_lahir);
    $('#data-tanggal_lahir').val(data_detail.detail_f101_tanggal_lahir);
    $('#data-umur').val(data_detail.detail_f101_umur);

    $('#data-kepemilikan_akta_lahir').val(data_detail.detail_f101_akta_lahir_id);
    $('#data-nomor_akta_kelahiran').val(data_detail.detail_f101_nomor_akta_kelahiran);
    $('#data-golongan_darah').val(data_detail.detail_f101_goldar_id);
    $('#data-agama').val(data_detail.detail_f101_agama_id);
    $('#data-status_kawin').val(data_detail.detail_f101_kawin_id);

    $('#data-tanggal_perkawinan').val(data_detail.detail_f101_tanggal_perkawinan);
    $('#data-kepemilikan_akta_perkawinan').val(data_detail.detail_f101_akta_perkawinan_id);
    $('#data-nomor_akta_perkawinan').val(data_detail.detail_f101_nomor_akta_perkawinan);
    $('#data-kepemilikan_akta_cerai').val(data_detail.detail_f101_akta_cerai_id);
    $('#data-nomor_akta_perceraian').val(data_detail.detail_f101_nomor_akta_perceraian);

    $('#data-hubungan_keluarga').val(data_detail.detail_f101_hubkel_id);
    $('#data-kepemilikan_kelainan').val(data_detail.detail_f101_kelainan_id);
    $('#data-penyandang_cacat').val(data_detail.detail_f101_cacat_id);
    $('#data-pendidikan').val(data_detail.detail_f101_pendidikan);
    $('#data-pekerjaan').val(data_detail.detail_f101_pekerjaan);

    $('#data-nik_ibu').val(data_detail.detail_f101_nik_ibu);
    $('#data-nama_lengkap_ibu').val(data_detail.detail_f101_nama_lengkap_ibu);
    $('#data-nik_ayah').val(data_detail.detail_f101_nik_ayah);
    $('#data-nama_lengkap_ayah').val(data_detail.detail_f101_nama_lengkap_ayah);
    // end::data-detail-f101

}

</script>