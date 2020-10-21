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
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/error/error-4.min.css') ?>">
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <?php $this->load->view($content) ?>
    </div>
    <!--end::Main-->
</body>
<!--end::Body-->
</html>