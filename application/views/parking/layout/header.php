<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <title>Al DANA SERVICE STATION | YES POS</title>

    <!-- Bootstrap -->
    <link href="<?=base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?=base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url() ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
   <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?=base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?=base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
    <link href="<?=base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?=base_url()?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datepicker/datepicker3.css">
    <!-- Custom Theme Style -->
    <link href="<?=base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
      <style type="text/css">
      @media screen and (max-width: 600px) {
      .nav_side{
          display: none;
               }
         }

    </style>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url() ?>" class="site_title"><img src="<?=base_url() ?>assets/images/logo.png" style="height: 43px;" /> <span> Al DANA SERVICE  </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                 <?php if(!empty($_SESSION['image'])) { ?>
           <img src="<?=base_url() ?>assets/images/employee/<?=$_SESSION['image']?>" alt="..." class="img-circle profile_img">
                <?php } else { ?>  
                <img src="<?=base_url() ?>assets/images/img.jpg" alt="" class="img-circle profile_img">
              <?php } ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=ucfirst($_SESSION['name']); ?></h2>
                </div>
              </div>
            <!-- /menu profile quick info -->
            <br />