<title>Edit Banjar</title>

<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    Banjar
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form class="form" id="pengumuman_form">
                <div class="card-body">
                    <!-- begin::id -->
                    <input type="hidden" name="banjar_id" id="banjar_id" value="<?= $banjar->banjar_id ?>">
                    <input type="hidden" name="banjar_wilayah_id" id="banjar_wilayah_id" value="<?= $banjar->banjar_wilayah_id ?>">
                    <!-- end::id -->
                    <!-- begin::banjar -->
                    <div class="form-group">
                        <label>Nama Banjar</label>
                        <input type="text" class="form-control" placeholder="Nama Banjar" name="banjar_nama"
                            id="banjar_nama" value="<?= $banjar->banjar_nama ?>"/>
                        <span style="display: none;" class="text-danger" id="need-nama">
                            Nama Banjar masih kosong
                        </span>
                    </div>
                    <!-- end::banjar -->
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary mr-2" id="btn-save">
                        Simpan
                    </button>
                    <button type="reset" class="btn btn-secondary" id="btn-cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('#banjar_nama').keyup( function() {
        if($('#banjar_nama').val() == '') {
            $('#banjar_nama').addClass('is-invalid');
            $('#need-nama').fadeIn(3);
        } else {
            $('#banjar_nama').removeClass('is-invalid');
            $('#need-nama').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        if($('#banjar_nama').val() == '') {
            $('#banjar_nama').addClass('is-invalid');
            $('#need-nama').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('desa/banjar/update') ?>',
                data: {
                    banjar_id: $('#banjar_id').val(),
                    banjar_wilayah_id: $('#banjar_wilayah_id').val(),
                    banjar_nama: $('#banjar_nama').val(),
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('.preloader').fadeOut();
                    window.location = '<?= base_url('/desa/banjar') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('desa/banjar') ?>'
    })
</script>