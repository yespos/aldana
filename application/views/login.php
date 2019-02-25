<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?=base_url();?>assets/images/logo.ico"/>
    <title>Aldana Services</title>

    <!-- Bootstrap -->
    <link href="<?=base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form" >
          <section class="login_content">
          <?php if($this->session->flashdata('message')) {  ?>
            <div class="alert alert-dismissible alert-danger">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong><?=$this->session->flashdata('message')  ?></strong> 
                </div>
              <?php } ?>
            <form  action="<?=base_url() ?>login/login_act" method="post">
               <h1>Aldana Services</h1> 
              <div>
                <input type="text" class="form-control" placeholder="Username" name="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <!-- <div>
                <input type="hidden" name="type" value="Employee">
               <select class="form-control" placeholder="type" name="type" required="">
                 <option value="Employee">Employee</option>
                 <option value="Biller">Biller</option>
               </select>
              </div> -->
              <div style="margin-top: 30px;">
                <input type="submit" class="btn btn-default submit" name="submit" value="Log in">
               <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
                <a class="reset_pass" href="<?= base_url('login/recovery')?>">Lost your password? </a>
              </div>

              <div class="clearfix"></div>

                <div class="separator">
            <!-- <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Aldana Services!</h1>
                  <p>©2018 All Rights Reserved. Jumeirah Life Style</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                   <h1><i class="fa fa-paw"></i> YesPos!</h1>
                  <p>©2018 All Rights Reserved. Jumeirah Life Style</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
