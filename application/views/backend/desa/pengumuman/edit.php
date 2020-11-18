<title>Edit Pengumuman</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Pengumuman
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="pengumuman_form">
            <div class="card-body">
                <!-- begin::id -->
                <input type="hidden" name="pengumuman_id" id="pengumuman_id" value="<?= $pengumuman->pengumuman_id?>">
                <input type="hidden" name="pengumuman_wilayah_id" id="pengumuman_wilayah_id" value="<?= $pengumuman->pengumuman_wilayah_id ?>">
                <!-- end::id -->
                <!-- begin::link -->
                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" class="form-control" placeholder="Judul Pengumuman" name="pengumuman_judul"
                        id="pengumuman_judul" value="<?= $pengumuman->pengumuman_judul ?>"/>
                    <span style="display: none;" class="text-danger" id="need-judul">
                        Judul Pengumuman masih kosong
                    </span>
                </div>
                <!-- end::link -->
                <!-- begin::deskripsi -->
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <textarea type="text" class="form-control" placeholder="Isi Pengumuman" name="pengumuman_isi"
                        id="pengumuman_isi"><?= $pengumuman->pengumuman_isi ?></textarea>
                    <span style="display: none;" class="text-danger" id="need-isi">
                        Isi Pengumuman masih kosong
                    </span>
                </div>
                <!-- end::deskripsi -->
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary mr-2" id="btn-save">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary" id="btn-cancel">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('#pengumuman_judul').keyup( function() {
        if($('#pengumuman_judul').val() == '') {
            $('#pengumuman_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else {
            $('#pengumuman_judul').removeClass('is-invalid');
            $('#need-judul').fadeOut(3);
        }
    });

    $('#pengumuman_isi').keyup( function() {
        if($('#pengumuman_isi').val() == '') {
            $('#pengumuman_isi').addClass('is-invalid');
            $('#need-isi').fadeIn(3);
        } else {
            $('#pengumuman_isi').removeClass('is-invalid');
            $('#need-isi').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        if($('#pengumuman_judul').val() == '') {
            $('#pengumuman_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else if($('#pengumuman_isi').val() == '') {
            $('#pengumuman_isi').addClass('is-invalid');
            $('#need-isi').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('desa/identitas-desa/pengumuman/update') ?>',
                data: {
                    pengumuman_id: $('#pengumuman_id').val(),
                    pengumuman_judul: $('#pengumuman_judul').val(), 
                    pengumuman_isi: $('#pengumuman_isi').val(), 
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('.preloader').fadeOut();
                    window.location = '<?= base_url('/desa/identitas-desa/pengumuman') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('desa/identitas-desa/pengumuman') ?>'
    })
</script>