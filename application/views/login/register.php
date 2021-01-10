<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      E-PKL
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register!</p>
        <?php
        if ($this->session->flashdata('err') == true) { ?>
          <center>
            <p style="color: red;">
              <?php echo $this->session->flashdata('err'); ?>
            </p>
          </center>
        <?php } ?>

        <?php
        if ($this->session->flashdata('sukses') == true) { ?>
          <center>
            <p style="color: green;">
              <?php echo $this->session->flashdata('sukses'); ?>
            </p>
          </center>
        <?php } ?>

        <form action="<?php echo base_url('login/create'); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <?= $image; ?><br><br>
            <input type="text" class="form-control" name="cap" placeholder="input captcha" required="">
            <?php
            if ($this->session->flashdata('cek') == true) { ?>
              <p style="color: red;"><?php echo $this->session->flashdata('cek'); ?></p>
            <?php } ?>
          </div>

          <div class="row">
            <div class="col-8"></div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>

        <a href="<?php echo base_url('login/index'); ?>" class="text-center">I already have a user!</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
</body>

</html>