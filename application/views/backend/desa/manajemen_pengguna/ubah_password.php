<div class="d-flex flex-column-fluid justify-content-center">
    <div class="container row justify-content-center">
        <div class="col-sm-12 col-lg-8">
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Ubah Password</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah password akun ini</span>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Form-->
                <form class="form" id="change_password_form">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Password Sekarang</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid mb-2"
                                    placeholder="Password sekarang" id="current_password" name="current_password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Password Baru</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="Password baru" id="new_password" name="new_password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Konfirmasi Password Baru</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control form-control-lg form-control-solid"
                                    placeholder="Konfirmasi password baru" id="new_password_confirmation" name="new_password_confirmation" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button id="cancel_button" type="reset" class="btn btn-lg btn-outline-secondary">Batal</button>
                        <button id="submit_button" type="submit" class="btn btn-lg btn-primary ml-2">Simpan</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();
    const form = document.getElementById('change_password_form');
    const fv = FormValidation.formValidation(
        form,
        {
            fields: {
                current_password: {
                    validators: {
                        notEmpty: {
                            message: "Password sekarang tidak boleh kosong"
                        }
                    }
                },
                new_password: {
                    validators: {
                        notEmpty: {
                            message: "Password baru tidak boleh kosong"
                        }
                    }
                },
                new_password_confirmation: {
                    validators: {
                        identical: {
                            compare: function() {
                                return $('#new_password').val();
                            },
                            message: "Password tidak sesuai"
                        },
                        notEmpty: {
                            message: "Konfirmasi password baru tidak boleh kosong"
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        }
    );
    const submit_button = $('#submit_button');
    const cancel_button = $('#cancel_button');

    form.querySelector('#new_password').addEventListener('input', function() {
        fv.revalidateField('new_password_confirmation');
    });

    $(document).ready(function() {
        submit_button.click(function(e) {
            $('.preloader').fadeIn();
            e.preventDefault();

            fv.validate().then(function(status) {
                console.log(status);
                if(status == "Valid") {
                    formData = new FormData(form);
                    $.ajax({
                        // url: "<?= base_url('debug') ?>",
                        url: "<?= base_url('desa/manajemen-pengguna/ubah-password/store') ?>",
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('.preloader').fadeOut();
                            // console.log(data);
                            bootbox.alert(data);
                        },
                        error: function(data) {
                            $('.preloader').fadeOut();
                            // console.log(data);
                            bootbox.alert(data.statusText);
                        }
                    })
                }
            })
        })
    })
</script>