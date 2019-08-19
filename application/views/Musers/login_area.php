<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>ColdStorage PT Dirgantara Indonesia | Login</title>

        <meta name="description" content="Apotek">
        <meta name="author" content="gunalirezqimauludi">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url()?>assets/img/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>assets/img/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url()?>assets/img/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url()?>assets/img/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/img/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url()?>assets/img/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>assets/img/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>assets/img/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url()?>assets/img/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>assets/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="<?=base_url()?>assets/img/favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?=base_url()?>assets/img/favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="<?=base_url()?>assets/css/oneui.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <link rel="stylesheet" id="css-theme" href="assets/css/themes/city.min.css">
        <!-- END Stylesheets -->
    </head>
    <body style="background-color:#fefefe">
        <!-- Login Content -->
        <div class="content content-boxed overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <div class="push-30-t push-50 animated fadeIn">
                        <!-- Login Title -->
                        <div class="text-center">
                            <!-- <i class="fa fa-2x fa-circle-o-notch text-warning"></i> -->
                            <img src="<?=base_url()?>assets/upload/logo/logo.png" width="250px">
                            <!-- <p class="text-muted push-15-t">Apotek</p> -->
                        </div>
                        <!-- END Login Title -->
                        <br>
                        <?php echo errorSuccess($this->session)?>
                        <?php if($error != '') echo errorMessage($error)?>

                        <!-- Login Form -->
                        <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-login form-horizontal push-30-t" action="<?=base_url()?>musers/dosign_in" method="post">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-warning floating">
                                        <input class="form-control" type="text" id="login-username" name="username" required>
                                        <label for="login-username">Username</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-warning floating">
                                        <input class="form-control" type="password" id="login-password" name="password" required>
                                        <label for="login-password">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group push-30-t">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                    <button class="btn btn-sm btn-block btn-warning" type="submit">Log in</button>
                                </div>
                            </div>
                        </form>
                        <!-- END Login Form -->

                        <!-- Login Footer -->
                        <div class="push-30-t text-center animated fadeInUp">
                            <small class="text-muted">ColdStorage PT Dirgantara Indonesia &copy; 2018</small>
                        </div>
                        <!-- END Login Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Login Content -->

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="<?=base_url()?>assets/js/core/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?=base_url()?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?=base_url()?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?=base_url()?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?=base_url()?>assets/js/core/jquery.placeholder.min.js"></script>
        <script src="<?=base_url()?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?=base_url()?>assets/js/app.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?=base_url()?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?=base_url()?>assets/js/pages/base_pages_login.js"></script>
    </body>
</html>
