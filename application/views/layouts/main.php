<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <?php if ($this->session->userdata['level'] == 1) {
  ?>
    <title>Admin</title>
  <?php } else {  ?>
    <title>User</title>
  <?php } ?>

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
  <link href="<?php echo base_url('assets/'); ?>css/table-responsive.css" rel="stylesheet">


</head>

<body>
  <section id="container">
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo"><b>TMS<span>UJA</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->

        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a onclick="return myConfirmLogout();" class="logout" href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a><img src="<?php echo base_url('assets/'); ?>img/ujaa.jpg" class="img-circle" width="90"></a></p>
          <?php if ($this->session->userdata['level'] == 1) {
          ?>

            <li class="mt">
              <a href="<?php echo base_url('dashboard'); ?>">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('user'); ?>">
                <i class="fa fa-user-circle"></i>
                <span>User</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('profile'); ?>">
                <i class="fa fa-male"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('jadwal'); ?>">
                <i class="fa fa-calendar"></i>
                <span>Jadwal</span>
              </a>
            </li>

          <?php } elseif ($this->session->userdata['level'] == 2) {
          ?>
            <li>
              <a href="<?php echo base_url('aplikasi'); ?>">
                <i class="fa fa-home"></i>
                <span>Dashboard </span>
              </a>
            </li>

          <?php }  ?>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <?php
            if (isset($_view) && $_view)
              $this->load->view($_view);
            ?>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="copyright text-center my-auto">
        <p>
          <strong> Copyright &copy; Umas Jaya Agrotama <?= date('Y'); ?></strong>.
        </p>

        <a class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('assets/'); ?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>lib/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url('assets/'); ?>lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url('assets/'); ?>lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url('assets/'); ?>lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    $('#notif').slideDown('slow').delay('4000').slideUp('slow');
  </script>
  <script>
    function myConfirmLogout() {
      var result = confirm("Anda yakin ingin keluar?");
      if (result == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>
  <script>
    function myConfirm() {
      var result = confirm("Anda yakin ingin menghapus?");
      if (result == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>


  <script>
    $(document).ready(function() {
      var i = 1
      $('#addjob').click(function() {
        i++
        $('#addform').append('<div id=af' + i + '><div class="form-row"> <div class="form-group col-md-12"> <label for="jobdes" class="control-label"><span class="text-danger">*</span>Jobdes</label> <input type="text" name="jobdes[]"  class="form-control" id="jobdes" /> <span class="text-danger"><?php echo form_error("jobdes"); ?></span> </div> </div> <div id="adduraian' + i + '"><div id="uf' + i + '"><div class="form-row"> <div class="form-group col-md-3"> <label for="aktivitas" class="control-label"><span class="text-danger">*</span>Aktivitas</label> <input type="text" name="aktivitas[]" value="" class="form-control" id="aktivitas" /> <span class="text-danger"><?php echo form_error("aktivitas[]"); ?></span> </div> <div class="form-group col-md-2"> <label for="period" class="control-label"><span class="text-danger">*</span>Period</label> <select name="period[]" class="form-control"> <option value="">Pilih Period</option> <?php foreach ($period as $p) { ?><option value="<?= $p['name'] . "/" . $p['value'] ?>"> <?= $p["name"] ?></option><?php } ?> </select> <span class="text-danger"><?php echo form_error("period"); ?></span> </div> <div class="form-group col-md-2"> <label for="waktu" class="control-label"><span class="text-danger">*</span>Waktu</label> <input type="text" name="waktu[]" value="" class="form-control" id="waktu" /> <span class="text-danger"><?php echo form_error("waktu[]"); ?></span> </div> <div class="form-group col-md-3"> <label for="frekuensi" class="control-label"><span class="text-danger">*</span>Frekuensi</label> <input type="text" name="frekuensi[]" value="" class="form-control" id="frekuensi" /> <span class="text-danger"><?php echo form_error("frekuensi[]"); ?></span> </div> <div class="form-group col-md-2"> <button class="btn btn-success btn-add-u" id="' + i + '" type="button" title="Tambah uraian"> <i class="glyphicon glyphicon-plus"></i> </button>  </div></div> </div></div> <div class="col-md-12"> <button class="btn btn-danger btn-small btn-remove" id="' + i + '" type="button">Hapus Jobdes</button> </div> </div></div>')
      })
      $(document).on('click', '.btn-remove', function() {
        var idbtn = $(this).attr('id')
        $('#af' + idbtn + '').remove()
      })
      $(document).on('click', '.btn-add-u', function() {
        var addid = $(this).attr('id')
        $('#adduraian' + addid + '').append('<div id="uf' + i + '"><div class="form-row"> <div class="form-group col-md-3"> <label for="aktivitas" class="control-label"><span class="text-danger">*</span>Aktivitas</label> <input type="text" name="aktivitas[]" value="" class="form-control" id="aktivitas" /> <span class="text-danger"><?php echo form_error("aktivitas[]"); ?></span> </div> <div class="form-group col-md-2"> <label for="period" class="control-label"><span class="text-danger">*</span>Period</label> <select name="period[]" class="form-control"> <option value="">Pilih Period</option> <?php foreach ($period as $p) { ?><option value="<?= $p['name'] . "/" . $p['value'] ?>"> <?= $p["name"] ?></option><?php } ?> </select> <span class="text-danger"><?php echo form_error("period"); ?></span> </div> <div class="form-group col-md-2"> <label for="waktu" class="control-label"><span class="text-danger">*</span>Waktu</label> <input type="text" name="waktu[]" value="" class="form-control" id="waktu" /> <span class="text-danger"><?php echo form_error("waktu[]"); ?></span> </div> <div class="form-group col-md-3"> <label for="frekuensi" class="control-label"><span class="text-danger">*</span>Frekuensi</label> <input type="text" name="frekuensi[]" value="" class="form-control" id="frekuensi" /> <span class="text-danger"><?php echo form_error("frekuensi[]"); ?></span> </div> <div class="form-group col-md-2"> <br> <label class="col-md-12"></label> <button class="btn btn-success btn-add-u" id="' + addid + '" type="button" title="Tambah uraian"> <i class="glyphicon glyphicon-plus"></i> </button> <button class="btn btn-danger btn-rm-u" id="' + i + '" type="button" title="Hapus Uraian"> <i class="glyphicon glyphicon-minus"></i> </button> </div></div></div></div>')
      })
      $(document).on('click', '.btn-rm-u', function() {
        var idbtn = $(this).attr('id')
        $('#uf' + idbtn + '').remove()
      })
    })
  </script>

  <script type="text/javascript">
    function adduraian() {
      var html = $(". copy").html();
      $(".after-add-more").after(html)
    }

    $(document).ready(function() {
      //saat remove
      $("body").on("click", "remove", function() {
        $(this).parent(". control-group").remove();

      });
    });
  </script>


</body>

</html>