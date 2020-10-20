<title>Edit Galeri</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Galeri
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="pengumuman_form">
            <div class="card-body">
                <!-- begin::id -->
                <input type="hidden" name="galeri_id" id="galeri_id" value="<?= $galeri->galeri_id?>">
                <input type="hidden" name="galeri_wilayah_id" id="galeri_wilayah_id" value="<?= $galeri->galeri_wilayah_id ?>">
                <!-- end::id -->
                <!-- begin::link -->
                <div class="form-group">
                    <label>Judul Galeri</label>
                    <input type="text" class="form-control" placeholder="Judul Galeri" name="galeri_judul"
                        id="galeri_judul" value="<?= $galeri->galeri_judul ?>"/>
                    <span style="display: none;" class="text-danger" id="need-judul">
                        Judul Galeri masih kosong
                    </span>
                </div>
                <!-- end::link -->
                <!-- begin::deskripsi -->
                <div class="form-group">
                    <label>Deskripsi Galeri</label>
                    <textarea type="text" class="form-control" placeholder="Deskripsi Galeri" name="galeri_deskripsi"
                        id="galeri_deskripsi"><?= $galeri->galeri_deskripsi ?></textarea>
                    <span style="display: none;" class="text-danger" id="need-isi">
                        Deskripsi Galeri masih kosong
                    </span>
                </div>
                <!-- end::deskripsi -->
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary mr-2" id="btn-save">
                    Submit
                </button>
                <button type="reset" class="btn btn-secondary" id="btn-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('#galeri_judul').keyup( function() {
        if($('#galeri_judul').val() == '') {
            $('#galeri_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else {
            $('#galeri_judul').removeClass('is-invalid');
            $('#need-judul').fadeOut(3);
        }
    });

    $('#galeri_deskripsi').keyup( function() {
        if($('#galeri_deskripsi').val() == '') {
            $('#galeri_deskripsi').addClass('is-invalid');
            $('#need-deskripsi').fadeIn(3);
        } else {
            $('#galeri_deskripsi').removeClass('is-invalid');
            $('#need-deskripsi').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        if($('#galeri_judul').val() == '') {
            $('#galeri_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else if($('#galeri_deskripsi').val() == '') {
            $('#galeri_deskripsi').addClass('is-invalid');
            $('#need-deskripsi').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('desa/galeri/update') ?>',
                data: {
                    galeri_id: $('#galeri_id').val(),
                    galeri_judul: $('#galeri_judul').val(), 
                    galeri_deskripsi: $('#galeri_deskripsi').val(), 
                    galeri_wilayah_id: $('#galeri_wilayah_id').val(),
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('.preloader').fadeOut();
                    window.location = '<?= base_url('/desa/galeri') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('desa/galeri') ?>'
    })
</script>