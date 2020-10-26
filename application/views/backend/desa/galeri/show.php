<title><?= $title ?></title>

<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <a href="<?= base_url('desa/galeri') ?>" class="btn btn-primary font-weight-bold">
                    <i class="flaticon2-left-arrow"></i> Kembali
                </a>
            </div>
            <div class="card-toolbar">
                <a target="_blank" href="<?= base_url('/galeri/foto/') . $galeri->galeri_slug ?>" class="btn btn-icon btn-light-info mr-2">
                    <i class="flaticon2-photograph"></i>
                </a>
                <a href="<?= base_url('desa/galeri/edit/') . $galeri->galeri_id ?>" class="btn btn-icon btn-light-warning mr-2">
                    <i class="flaticon2-edit"></i>
                </a>            
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Judul</td>
                        <td><?= $galeri->galeri_judul ?></td>
                    </tr>                              
                    <tr>
                        <td>Deskripsi</td>
                        <td><?= $galeri->galeri_deskripsi ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><?= $galeri->galeri_created_at ?></td>
                    </tr>
                </tbody>
            </table>
            <form id="form_galeri" method="POST" enctype="multipart/form-data" role="form">
            <div class="form-group">
                <div></div>
                <input type="hidden" name="galeri_id" id="galeri_id" value="<?php echo $galeri->galeri_id ?>">
                <input type="hidden" name="slug_galeri" id="slug_galeri" value="<?php echo $galeri->galeri_slug ?>">
            </div>
        </form>
        </div>
    </div>
</div>

<?php if(isset($message)) {
    echo('
    <div class="alert alert-custom alert-outline-2x alert-outline-primary fade show mb-5" id="message" role="alert">
        <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
        <div class="alert-text">'
        .$message.
        '</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
    ');
} ?>

<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    Foto Galeri
                </h3>
            </div>
            <div class="card-toolbar">           
            </div>
        </div>
        <div class="card-body">
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
        </div>
    </div>
</div>

<script>
    $('.preloader').fadeOut();
    var KTDatatablePengumuman = function () {
        var demo = function() {
            var datatable = $('#kt_datatable').KTDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '<?= base_url('desa/detail/galeri/data/'.$galeri->galeri_id) ?>',
                            map: function(raw) {
                                var dataset = raw;
                                if(typeof raw.data !== 'undefined') {
                                    dataset = raw.data;
                                }
                                return dataset;
                            }
                        }
                    },
                    pageSize: 10,
                    serverSorting: false
                },
                layout: {
                    scroll: false,
                    footer: false
                },
                pagnation: true,
                columns: [
                    {
                        field: 'detail_galeri_foto',
                        title: 'Foto',
                        sortable: true,
                        template: function(row) {
                            if(row.galeri_media_jenis == 0){
                                return '<img src="<?php echo base_url("/storage/desa/BLAHBATUH/galeri")?>'+row.detail_galeri_foto+ '"'+'width="200"/>';            
                            }else{
                                return row.detail_galeri_foto
                            }
                                           
                        }
                    },                 
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 100,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            return '\
                                <button data-galeri_id="'+row.detail_galeri_galeri_id+'" data-id_media="'+row.detail_galeri_id+'" class="btn btn-sm btn-clean btn-icon btnDelete" title="Delete">\
                                    <span class="svg-icon svg-icon-md">\
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                <rect x="0" y="0" width="24" height="24"/>\
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                            </g>\
                                        </svg>\
                                    </span>\
                                </button>\
                            ';
                        }
                    }
                ]
            });

            $(document).on("click", ".btnDelete", function() {
                let galeri_id = $(this).data('galeri_id');
                let detail_galeri_id = $(this).data('detail_galeri_id');
                bootbox.confirm({
                    title: "Hapus Galeri",
                    message: "Apakah anda yakin menghapus Galeri?",
                    buttons: {
                        cancel: {
                            label: "Batal"
                        },
                        confirm: {
                            label: "Hapus",
                            className: 'btn-primary'
                        }
                    },
                    callback: function(result) {
                        if(result) {
                            $('.preloader').fadeIn();
                            $.ajax({
                                type: 'GET',
                                url: "<?= base_url('galeri/delete_media/') ?>" + detail_galeri_id + "/" + galeri_id,
                                dataType: 'json',
                                success: function(data) {
                                    $('.preloader').fadeOut();
                                    window.location.reload();
                                },
                                error: function(xhr, desc, err) {
                                    console.log(xhr.responseText);
                                }                                
                            });
                        }
                    }
                });
            });
        }

        return {
            init: function() {
                demo();
            }
        };
    }();

    $(document).ready(function() {
        KTDatatablePengumuman.init()
    });

    $('.btnNew').click(function() {
        window.location = '<?= base_url('desa/banner/create') ?>'
    })


$('#link_video').keyup( function() {
  if($('#link_video').val() == '') {
      $('#link_video').addClass('is-invalid');
      $('#need-link').fadeIn(3);
  } else {
      $('#link_video').removeClass('is-invalid');
      $('#need-link').fadeOut(3);
  }
  });

$("#validasi").on('click',function(){
  // e.preventDefault(); 
  // var data = $("#testForm").serialize();
    var fileToUpload = $('input:file').val();
    var formData = new FormData($("#form_galeri")[0]);
    var id = $('#galeri_id').val();
    var slug = $('#slug_galeri').val();       
    if(fileToUpload == '' && $('#video_galeri').val() == ''){
      $('#foto_galeri').addClass('is-invalid');
      $('#need-foto').fadeIn(3);
      $('#video_galeri').addClass('is-invalid');
      $('#need-link').fadeIn(3);
    }else{
      $.ajax({
        url : '<?php echo site_url('desa/galeri/media/store/')?>'+id+'/'+slug,
        type : 'POST',  
        data: formData,
        processData:false,
        contentType:false,
        cache:false,
        async:false,     
        // dataType : 'json',
        // data : data,
        success: function(data){                
          alert("Upload Data berhasil di lakukan");
          location.reload();
          console.log(data);                    
        }
      })            
    }
})
</script>

