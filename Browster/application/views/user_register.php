<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Browster - Register Page</title>
    <link href="<?php echo base_url().'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="<?php echo base_url().'assets/css/signin1.css'; ?>" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="<?php echo base_url().'userregister/user_add_act'; ?>">
    <div>
      <i class="fas fa-archive fa-4x"></i>
    </div>
    <h1 class="h3 mb-3 font-weight-normal">Browster Register User</h1>
    <div class="col-lg-12 col-md-12 col-sm-12">
      <p class="mbr-text mbr-fonts-style mb-4 display-7">Or login in <a href="<?php echo base_url().'userlogin'; ?>" class="text-primary">here</a></p>
    </div>
    <?php
      if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo '<div class="alert alert-danger text-left" role="alert"><strong>Login Failed!</strong><br>Invalid Details</div>';
        } else if($_GET['pesan'] == "logout"){
            echo '<div class="alert alert-success text-left" role="alert">Logged Out!</div>';
        } else if($_GET['pesan'] == "belumlogin"){
            echo '<div class="alert alert-warning text-left" role="alert">Please login to continue</div>';
        }
      }
    ?>
    <label for="inputUname" class="sr-only">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" placeholder="nama" required>
    <?php echo form_error('nama'); ?>
    <label for="inputUname" class="sr-only">Username</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
    <?php echo form_error('username'); ?>
    <label for="inputUname" class="sr-only">Email</label>
    <input type="text" name="email" id="email" class="form-control" placeholder="email" required>
    <?php echo form_error('email'); ?>
    <label for="inputUname" class="sr-only">Alamat</label>
    <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" required>
    <label for="inputUname" class="sr-only">Nomor HP</label>
    <input type="text" name="hp" id="hp" class="form-control" placeholder="Nomor HP" required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <?php echo form_error('password'); ?>
    <label for="inputulang_pass" class="sr-only">Retype Password</label>
    <input type="password" name="ulang_pass" id="ulang_pass" class="form-control" placeholder="Retype Password" required>
    <?php echo form_error('ulang_pass'); ?>
    <button class="btn btn-lg btn-danger btn-block" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021 Browster<br>Universitas Multimedia Nusantara</p>
  </form>
  </body>
</html>