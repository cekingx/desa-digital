<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Show Pengajuan</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="px-5">
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
                            href="<?= base_url('capil/' . $form['url'] . $form['form_id']) ?>">
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
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-warning mr-5">
                                    <span class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-warning">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Write.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column font-weight-bold">
                                    <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg"><?= $lampiran->detail_pengajuan_lampiran_nama ?></a>
                                </div>
                                <!--end::Text-->
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <span class="label font-weight-bold label-lg label-light-success label-inline">Tidak Ada</span>
                    <?php endif; ?>
                    <!-- end::lampiran -->
                </div>
            </div>
            <div class="card-footer text-right">
                <button 
                    type="button" 
                    class="btn btn-primary btn-modal">Tindak Lanjuti</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="update_status" class="form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <input type="hidden" name="id_pengajuan" value="<?= $pengajuan['pengajuan']->pengajuan_id ?>">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_pengajuan" id="update_status_pengajuan" class="form-control">
                                <?php foreach($status_pengajuan as $status_pengajuan): ?>
                                    <option value="<?= $status_pengajuan->status_pengajuan_id ?>"><?= $status_pengajuan->status_pengajuan_deskripsi ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div style="display: none;" id="komentar_group" class="form-group">
                            <label>Komentar</label>
                            <textarea class="form-control" name="komentar" id="komentar" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();
    const status_pengajuan = <?= $status_pengajuan_json; ?>;
    const jenis_layanan = <?= $jenis_layanan_json; ?>;

    $(document).ready(function() {
        render_status_pengajuan(<?= $pengajuan['pengajuan']->pengajuan_status_pengajuan_id; ?>)
        render_jenis_layanan(<?= $pengajuan['pengajuan']->pengajuan_jenis_layanan; ?>)
    });

    $('#update_status').submit(function(e) {
        e.preventDefault();
        $('#exampleModal').modal('hide');

        form = new FormData(this);
        $('.preloader').fadeIn();
        $.ajax({
            url: '<?= base_url('capil/pengajuan/penerbitan-kk-baru/set-status-pengajuan') ?>',
            data: form,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {
                $('.preloader').fadeOut();
                console.log(data);
                bootbox.alert('Data berhasil di ubah', function() {
                    location.reload();
                });
            },
            error: function(error) {
                $('.preloader').fadeOut();
                console.log(error.responseText);
                bootbox.alert(error.responseText, function() {
                    location.reload();
                });
            }
        });
    })

    $('.btn-modal').click(function(){
        $('#exampleModal').modal();
    });

    $('#update_status_pengajuan').change(function() {
        if($(this).val() == 7) {
            $('#komentar_group').fadeIn();
        } else {
            $('#komentar_group').fadeOut();
        }
    });
    
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