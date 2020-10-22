<title>Banjar</title>

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
                <!-- begin::banjar -->
                <div class="form-group">
                    <label>Nama Banjar</label>
                    <input type="text" class="form-control" placeholder="Nama Banjar" name="banjar_nama"
                        id="banjar_nama" />
                    <span style="display: none;" class="text-danger" id="need-nama">
                        Nama Banjar masih kosong
                    </span>
                </div>
                <!-- end::banjar -->
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
                url: '<?= base_url('desa/banjar/store') ?>',
                data: {
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