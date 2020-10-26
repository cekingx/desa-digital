<title><?= $title ?></title>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">Buat Admin Capil</div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xxl-7">
                        <form class="form" id="admin-capil-form">
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('#admin-capil-form').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: "<?= base_url('super/admin-capil/store') ?>",
        data: new FormData(this),
        type: 'POST',
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
            bootbox.alert('Data berhasil dibuat', function() {
                window.location = '<?= base_url('super/admin-capil'); ?>'
            })
        },
        error: function(error) {
            console.log(error);
        }
    });
})

</script>