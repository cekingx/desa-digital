<title><?= $title ?></title>

<div class="d-flex flex-column-fluid justify-content-center">
    <div class="container row justify-content-center">
        <div class="col-sm-12 col-lg-8">
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Reset Password</h3>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Form-->
                <form class="form" id="change_password_form">
                    <div class="card-body">
                        <input type="hidden" name="user_id" id="user_id" value="<?= $user->user_id ?>">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Nama</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-2"
                                    value="<?= $user->user_nama ?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Username</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    value="<?= $user->user_username ?>" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button id="cancel_button" type="reset" class="btn btn-lg btn-outline-secondary">Batal</button>
                        <button id="reset_button" type="button" class="btn btn-lg btn-light-danger ml-2">Reset Password</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('#reset_button').click(function() {
        bootbox.confirm({
            message: "Yakin reset password?",
            buttons: {
                confirm: {
                    label: 'Yakin',
                    className: 'btn-light-danger'
                },
                cancel: {
                    label: 'Batal',
                    className: 'btn-outline-secondary'
                }
            },
            callback: function (result) {
                $('.preloader').fadeIn();
                if(result) {
                    let data = new FormData();
                    data.append('user_id', $('#user_id').val());
                    $.ajax({
                        // url: '<?= base_url('debug') ?>',
                        url: '<?= base_url('super/admin-capil/reset-password/store') ?>',
                        type: 'POST',
                        data: data,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('.preloader').fadeOut();
                            bootbox.alert(data);
                            console.log(data);
                        },
                        error: function(data) {
                            console.log(data)
                        }
                    })
                }
            }
        });

    });

    $('#cancel_button').click(function() {
        window.location = '<?= base_url('super/admin-capil/') ?>'
    })
</script>