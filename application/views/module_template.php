<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>ColdStorage PT Dirgantara Indonesia | {title}</title>

        <meta name="description" content="Apotek">
        <meta name="author" content="gunalirezqimauludi">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <?php if($this->uri->segment(1) == 'linforuangan'){ ?>
        <meta http-equiv="refresh" content="5">
        <? } ?>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="apple-touch-icon" sizes="57x57" href="{img_path}favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{img_path}favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{img_path}favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{img_path}favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{img_path}favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{img_path}favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{img_path}favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{img_path}favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{img_path}favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="{img_path}favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{img_path}favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="{img_path}favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{img_path}favicons/favicon-16x16.png">
        <link rel="manifest" href="{img_path}favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{img_path}favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{plugins_path}bootstrap-datepicker/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="{plugins_path}bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="{plugins_path}bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="{plugins_path}select2/select2.min.css">
        <link rel="stylesheet" href="{plugins_path}select2/select2-bootstrap.min.css">
        <link rel="stylesheet" href="{plugins_path}jquery-auto-complete/jquery.auto-complete.min.css">
        <link rel="stylesheet" href="{plugins_path}ion-rangeslider/css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="{plugins_path}ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
        <link rel="stylesheet" href="{plugins_path}dropzonejs/dropzone.min.css">
        <link rel="stylesheet" href="{plugins_path}jquery-tags-input/jquery.tagsinput.min.css">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{js_path}plugins/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{js_path}plugins/slick/slick.min.css">
        <link rel="stylesheet" href="{js_path}plugins/slick/slick-theme.min.css">
        <script type="text/javascript" src="{js_path}core/jquery.min.js"></script>

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{js_path}plugins/sweetalert2/sweetalert2.min.css">

        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="{css_path}bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="{css_path}oneui.css">

        <!-- Bootstrap Select -->
        <script src="{plugins_path}bootstrap-select/bootstrap-select.min.js"></script>
        <link rel="stylesheet" href="{plugins_path}bootstrap-select/bootstrap-select.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <link rel="stylesheet" id="css-theme" href="{css_path}themes/city.min.css">
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available Classes:

            'enable-cookies'             Remembers active color theme between pages (when set through color theme list)

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <a class="h5 text-white" href="<?php echo site_url(); ?>">
                                <img src="<?=base_url()?>assets/upload/logo/logo.png" width="50px" style="margin-left: 50%; margin-right: 50%; transform: translate(93%, -10%);">
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content side-content-full">
                            <ul class="nav-main">
                              <?php $this->load->view('module_navigation'); ?>
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
              <?php $this->load->view('module_header');?>
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
              <!-- Page Content -->
              <?php if($this->uri->segment(1) != 'home'){ ?>
              <div class="content">
              <? } ?>

                <!-- Breadcrumb -->
                <?php if($this->uri->segment(1) != 'home'){ ?>
                <ol class="breadcrumb push-15">
                    <?php echo backendBreacrum($breadcrum)?>
                </ol>
                <? } ?>
                <!-- END Breadcrumb -->

                <?php $this->load->view($content);?>
              <?php if($this->uri->segment(1) != 'home'){ ?>
              </div>
              <? } ?>
              <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-left">
                    <a class="font-w600" href="#" target="_blank">ColdStorage PT Dirgantara Indonesia</a> &copy; 2018</span>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <!-- <script src="{js_path}core/jquery.min.js"></script> -->
        <script src="{js_path}core/bootstrap.min.js"></script>
        <script src="{js_path}core/jquery.slimscroll.min.js"></script>
        <script src="{js_path}core/jquery.scrollLock.min.js"></script>
        <script src="{js_path}core/jquery.appear.min.js"></script>
        <script src="{js_path}core/jquery.countTo.min.js"></script>
        <script src="{js_path}core/jquery.placeholder.min.js"></script>
        <script src="{js_path}core/js.cookie.min.js"></script>
        <script src="{js_path}app.js"></script>

        <!-- Page JS Plugins -->
        <script src="{plugins_path}bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="{plugins_path}bootstrap-datetimepicker/moment.min.js"></script>
        <script src="{plugins_path}bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="{plugins_path}bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="{plugins_path}bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="{plugins_path}select2/select2.full.min.js"></script>
        <script src="{plugins_path}masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="{plugins_path}jquery-auto-complete/jquery.auto-complete.min.js"></script>
        <script src="{plugins_path}ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="{plugins_path}dropzonejs/dropzone.min.js"></script>
        <script src="{plugins_path}jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="{plugins_path}datatables/jquery.dataTables.min.js"></script>
        <script src="{plugins_path}slick/slick.min.js"></script>
        <script src="{plugins_path}chartjs/Chart.min.js"></script>
        <script src="{plugins_path}custom-file-input/custom-file-input.js"></script>
        <script src="{plugins_path}autoNumeric/autoNumeric.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="{plugins_path}bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="{plugins_path}sweetalert2/es6-promise.auto.min.js"></script>
        <script src="{plugins_path}sweetalert2/sweetalert2.min.js"></script>
        <script src="{plugins_path}jquery-number/jquery.number.js"></script>

        <!-- Page JS Code -->
        <?php if($this->uri->segment(1) == 'home'){ ?>
        <script src="{js_path}pages/base_pages_home.js"></script>
        <? } ?>
        <script src="{js_path}pages/base_forms_pickers_more.js"></script>
        <script src="{js_path}pages/base_tables_datatables.js"></script>
        <script>
            jQuery(function () {
                // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
                App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs', 'slick']);
            });
        </script>
    </body>
</html>
