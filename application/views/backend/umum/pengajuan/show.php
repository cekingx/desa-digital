<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label"><?= $pengajuan['pengajuan']->layanan ?></h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xxl-7">
                        <!-- begin::pengajuan -->
                        <h5>Pengajuan</h5>
                        <table class="table table-bordered my-5">
                            <tr>
                                <td>NIK Pemohon</td>
                                <td><?= $pengajuan['pengajuan']->pengajuan_nik; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Layanan</td>
                                <td id="jenis_layanan"></td>
                            </tr>
                            <tr>
                                <td>Status Pengajuan</td>
                                <td id="status_pengajuan"></td>
                            </tr>
                            <tr>
                                <td>Komentar</td>
                                <?php if(!empty($pengajuan['pengajuan']->pengajuan_komen)): ?>
                                    <td><?= $pengajuan['pengajuan']->pengajuan_komen; ?></td>
                                <?php else: ?>
                                    <td><span class="label font-weight-bold label-lg  label-light-success label-inline">Tidak Ada</span></td>
                                <?php endif; ?>
                            </tr>
                        </table>
                        <!-- end::pengajuan -->
                        <hr>
                        <br>
                        <!-- begin::form-yang-digunakan -->
                        <h5 class="mb-5">Form yang Digunakan</h5>
                        <?php if(!empty($pengajuan['form_pengajuan'])): ?>
                            <?php foreach($pengajuan['form_pengajuan'] as $form): ?>
                                <a class="d-flex align-items-center mb-5" 
                                target="_blank"
                                href="<?= base_url('umum/' . $form['url'] . $form['form_id']) ?>">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-primary svg-icon-lg"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column font-weight-bold">
                                        <div class="text-dark-75 text-hover-primary mb-1 font-size-lg"><?= $form['nama_form'] ?></div>
                                    </div>
                                    <!--end::Text-->
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="label font-weight-bold label-lg  label-light-success label-inline">Tidak Ada</span>
                        <?php endif; ?>
                        <!-- end::form-yang-digunakan -->
                        <hr>
                        <br>
                        <!-- begin::lampiran -->
                        <h5 class="mb-5">Lampiran</h5>
                        <?php if(!empty($pengajuan['lampiran_pengajuan'])): ?>
                            <?php foreach($pengajuan['lampiran_pengajuan'] as $lampiran): ?>
                                <a class="d-flex align-items-center mb-5"
                                target="_blank"
                                href="<?= base_url($lampiran->detail_pengajuan_lampiran_path . '/' . $lampiran->detail_pengajuan_lampiran_nama_file); ?>">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-success mr-5">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Home/Picture.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"/>
                                                    <polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"/>
                                                    <polygon fill="#000000" points="11 20 15.5 14 20 20"/>
                                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column font-weight-bold">
                                        <div class="text-dark-75 text-hover-primary mb-1 font-size-lg"><?= $lampiran->detail_pengajuan_lampiran_nama ?></div>
                                    </div>
                                    <!--end::Text-->
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="label font-weight-bold label-lg label-light-success label-inline">Tidak Ada</span>
                        <?php endif; ?>
                        <!-- end::lampiran -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const status_pengajuan = <?= $status_pengajuan; ?>;
    const jenis_layanan = <?= $jenis_layanan; ?>;

    $(document).ready(function() {
        $('.preloader').fadeOut();
        render_status_pengajuan(<?= $pengajuan['pengajuan']->pengajuan_status_pengajuan_id; ?>)
        render_jenis_layanan(<?= $pengajuan['pengajuan']->pengajuan_jenis_layanan; ?>)
    })
    
    function render_status_pengajuan(id_status_pengajuan)
    {
        let text = 'undefined';
        status_pengajuan.forEach(function(item){
            if(item.status_pengajuan_id == id_status_pengajuan) {
                text = item.status_pengajuan_deskripsi;
            }
        })
        data = `<span class="label font-weight-bold label-lg label-light-primary label-inline">${ text }</span>`;
        $('#status_pengajuan').append(data);
    }

    function render_jenis_layanan(id_jenis_layanan)
    {
        let text = 'undefined';
        jenis_layanan.forEach(function(item){
            if(item.layanan_id == id_jenis_layanan) {
                text = item.layanan_nama;
            }
        })
        data = `<span class="label font-weight-bold label-lg label-light-primary label-inline">${ text }</span>`;
        $('#jenis_layanan').append(data);
    }
</script>