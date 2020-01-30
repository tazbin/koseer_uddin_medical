<?php
  include_once dirname( __FILE__ ).'/../lib/session.php';
  session::init();
  session::adminIsNotLogin();

  if ( isset($_GET['action']) && $_GET['action'] == 'logout' ) {
    session::destroy();
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Koser Uddin Medical Hospital </title>
    <link rel="icon" href="<?php echo BASE_URL;?>/images/medical-logo.webp" type="image/gif" sizes="16x16">

    <!-- Bootstrap -->
    <link href="<?php echo BASE_URL;?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo BASE_URL;?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo BASE_URL;?>/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="<?php echo BASE_URL;?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo BASE_URL;?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo BASE_URL;?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo BASE_URL;?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo BASE_URL;?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo BASE_URL;?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo BASE_URL;?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title">
                <!-- <i class="fa fa-paw"></i>  -->
                <img src="<?php echo BASE_URL;?>/images/medical-logo.webp" style="width: 45px;" alt="">
                <span style="font-size: 15px;">Koseer Uddin Hospital</span></a>
            </div>

            <div class="clearfix"></div>

            <br />
