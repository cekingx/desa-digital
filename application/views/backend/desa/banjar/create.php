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
    $('#btn-save').click( function() {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('desa/banjar/store') ?>',
                data: {
                    banjar_nama: $('#banjar_nama').val(),
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    window.location = '<?= base_url('/desa/banjar') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('desa/banjar') ?>'
    })
</script>