<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">Buat Admin Desa</div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xxl-7">
                        <form class="form" id="admin-desa-form">
                            <!-- begin::username -->
                            <div class="form-group">
                                <label for="user_username">Username</label>
                                <input type="text" class="form-control" id="user_username" name="user_username">
                            </div>
                            <!-- end::username -->
                            <!-- begin::nama -->
                            <div class="form-group">
                                <label for="user_nama">Nama</label>
                                <input type="text" class="form-control" id="user_nama" name="user_nama">
                            </div>
                            <!-- end::nama -->
                            <!-- begin::wilayah -->
                            <div class="form-group">
                                <label for="user_wilayah_id">Kelurahan</label>
                                <select name="user_wilayah_id" id="user_wilayah_id" class="form-control select2">
                                    <?php foreach($wilayah as $kecamatan => $kelurahan): ?>
                                        <?= '<optgroup label="' . $kecamatan . '">' ?>
                                            <?php foreach($kelurahan as $kelurahan): ?>
                                                <?= '<option value="' . $kelurahan['id'] . '">' . $kelurahan['nama'] . '</option>' ?>
                                            <?php endforeach; ?>
                                        <?= '</optgroup>' ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- end::wilayah -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Class definition
var KTSelect2 = function () {
    // Private functions
    var demos = function () {
        // nested
        $('#user_wilayah_id').select2({
            placeholder: "Pilih Wilayah"
        });
    }

    // Public functions
    return {
        init: function () {
            demos();
        }
    };
}();

// Initialization
jQuery(document).ready(function () {
    KTSelect2.init();
});

$('#admin-desa-form').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: "<?= base_url('super/admin-desa/store') ?>",
        data: new FormData(this),
        type: 'POST',
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
        },
        error: function(error) {
            console.log(error);
        }
    });
})

</script>