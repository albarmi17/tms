<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Login</title>

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/'); ?>img/uja.jpg" rel="icon">
  <link href="<?php echo base_url('assets/'); ?>img/ujaa.jpg" rel="ujaa-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/'); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url('assets/'); ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>css/style-responsive.css" rel="stylesheet">

</head>

<body>

  <div id="login-page">
    <div class="container">
      <?php echo form_open('auth/', ['class' => 'form-login']); ?>
      <h2 class="form-login-heading">sign in now</h2>
      <div class="login-wrap">
        <div id="notif">
          <?= $this->session->flashdata('message'); ?>
        </div>

        <input type="text" class="form-control" placeholder="Username" autofocus name="username" value="<?= set_value('username'); ?>">
        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        <br>
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password'); ?>">
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        <br>

        <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        <hr>

      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <script src="<?php echo base_url('assets/'); ?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>lib/bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("<?php echo base_url('assets/'); ?>img/ny.jpg", {
      speed: 500
    });
  </script>
  <script type="text/javascript">
    $('#notif').slideDown('slow').delay('2000').slideUp('slow');
  </script>
</body>

</html>