<html lang="en">
<!--begin::Head-->
<head>
    <?php $this->load->view('layouts/css.php'); ?>
    <?php $this->load->view('layouts/js.php'); ?>
    <style>
        #anim {
            position:absolute;top:-100;z-index:0;width:40%;text-align:center;right:0;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            width: 100%;
            color: #fff;
            position: relative;
            opacity: 70%;
            padding: 0.65rem 3rem 0.65rem 2rem;
            line-height: 1.5;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #fff;
            line-height: 28px;
        }

        .select2-container--default .select2-selection--single {
            /* background-color: #fff; */
            /* border: 1px solid #aaa; */
            border:0px;
            background-color: rgba(33, 33, 33, 0.28) !important;
            border-radius: 50rem !important;
            color: white;
            /* border-radius: 50%; */
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen 
        and (min-device-width : 320px) 
        and (max-device-width : 480px) {
            #anim {
                position:absolute;right:0;top:-30;z-index:0;width:100%;
            }
        }

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile position:absolute;right:0;top:80;z-index:0;width:200px;-->
    <!-- <div class="preloader">
        <div class="loading">
            <img src="<?php echo base_url('assets/img/loader.gif') ?>" width="80">
        </div>
    </div> -->
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
    <img id="anim" src="<?php echo base_url('assets/img/logo_transparent.png')?>">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <?php $this->load->view($content) ?>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
</body>
<!--end::Body-->
</html>