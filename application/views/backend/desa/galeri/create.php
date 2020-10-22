<title>Galeri</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Galeri
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="form_galeri" enctype="multipart/form-data" method="POST">
            <div class="card-body">
                <!-- begin::banjar -->
                <div class="form-group">
                    <label>Judul Galeri</label>
                    <input type="text" class="form-control" placeholder="Judul Galeri" name="judul_galeri"
                        id="judul_galeri"/>
                    <span style="display: none;" class="text-danger" id="need-judul">
                        Judul Galeri masih kosong
                    </span>
                </div>
                <!-- end::banjar -->
                <!-- begin::foto -->
                <div class="form-group">
                  <label>Foto</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto_galeri" name = "foto_galeri[]" multiple="">
                    <label class="custom-file-label" for="customFile">Choose file</label>      
                  </div>
                  <span style="display: none;" class="form-text text-muted" id="need-foto" >
                  foto masih kosong
                  </span> 
                </div>
                <!-- end::foto -->
                <!-- begin::isi -->
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Galeri</label>
                  <textarea class="form-control" name="deskripsi_galeri" id="deskripsi_galeri" rows="3" placeholder="Enter ..." required></textarea>
                  <span style="display: none;" class="form-text text-muted" id="need-deskripsi" >
                    Deskripsi masih kosong
                  </span> 
                </div> 
                <!-- end::isi -->
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

    $('#judul_galeri').keyup( function() {
        if($('#judul_galeri').val() == '') {
            $('#judul_galeri').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else {
            $('#judul_galeri').removeClass('is-invalid');
            $('#need-judul').fadeOut(3);
        }
    });

    $('#deskripsi_galeri').keyup( function() {
        if($('#deskripsi_galeri').val() == '') {
            $('#deskripsi_galeri').addClass('is-invalid');
            $('#need-deskripsi').fadeIn(3);
        } else {
            $('#deskripsi_galeri').removeClass('is-invalid');
            $('#need-deskripsi').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
    var formData = new FormData($("#form_galeri")[0]);

        if($('#judul_galeri').val() == '') {
            $('#judul_galeri').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else if($('#deskripsi_galeri').val() == '') {
            $('#deskripsi_galeri').addClass('is-invalid');
            $('#need-deskripsi').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('desa/galeri/store') ?>',
                data: formData,
                processData:false,
                contentType:false,
                cache:false,
                async:false,     
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