<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
        <title>Hoster - Home</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>web/assets/mobirise-icons2/mobirise2.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>tether/tether.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>dropdown/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>socicon/css/styles.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/')?>theme/css/style.css">
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,700;1,400;1,700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,700;1,400;1,700&display=swap&display=swap"></noscript>
        <link rel="preload" as="style" href="<?php echo base_url('assets/')?>mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    </head>
    <body>
        <section class="menu menu1 cid-szL1pl871l" once="menu" id="menu1-0">
            <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
                <div class="container">
                    <div class="navbar-brand">
                        <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-5" href="<?php echo base_url().'home'; ?>">Hoster!</a></span>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?php echo base_url().'cekhotel'; ?>">Cek Hotel</a></li>
                            <?php
                                    if($this->session->userdata('user_status') == 'login'){
                                        echo '<li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="'. base_url().'frontend/dashboard/logout" >logout</a></li>';
                                        echo '<li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="'. base_url().'frontend/dashboard/index" >Dashboard</a></li>';
                                    }
                                    else {
                                        echo '<li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="'. base_url().'userlogin"> Login </a></li>';
                                    }
                                ?>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?php echo base_url().'about'; ?>">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section class="header14 cid-szL1BpNWiH mbr-fullscreen" id="header14-1">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 image-wrapper">
                        <img src="assets/images/912a2cad-c44e-44d4-81b3-b6701e2eee12-1603885268118-5f0f932b013133f6d29aeb453cd282f9.jpeg" alt="Mobirise">
                    </div>
                    <div class="col-12 col-md">
                        <div class="text-wrapper">
                            <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2">
                                <strong>Selamat datang di Hoster!</strong></h1>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Dapatkan penawaran hotel dengan harga miring!<br>Buruan booking sebelum kehabisan!</p>
                            <div class="mbr-section-btn mt-3"><a class="btn btn-secondary display-4" href="<?php echo base_url().'cekhotel'; ?>">Cek Hotel</a>
                                <a class="btn btn-black-outline display-4" href="<?php echo base_url().'userregister'; ?>">Create account &gt;</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features4 cid-szL1IjXiH4" id="features4-2">
            <div class="mbr-overlay"></div>
            <div class="container">
                <div class="mbr-section-head">
                    <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Mau liburan kemana?</strong></h4>
                </div>
                <div class="row mt-4">
                    <div class="item features-image сol-12 col-md-6 col-lg-4">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <img src="assets/images/jakarta-office.jpg" alt="" title="">
                            </div>
                            <div class="item-content">
                                <h5 class="item-title mbr-fonts-style display-5"><strong>Jakarta</strong></h5>
                            </div>
                            <div class="mbr-section-btn item-footer mt-2"><a href="<?php echo base_url().'hoteljakarta'; ?>" class="btn item-btn btn-black display-7" target="_blank">Start Now
                                    &gt;</a></div>
                        </div>
                    </div>
                    <div class="item features-image сol-12 col-md-6 col-lg-4">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <img src="assets/images/daerah-semarang.jpeg" alt="" title="">
                            </div>
                            <div class="item-content">
                                <h5 class="item-title mbr-fonts-style display-5"><strong>Semarang</strong></h5>
                            </div>
                            <div class="mbr-section-btn item-footer mt-2"><a href="<?php echo base_url().'hotelsemarang'; ?>" class="btn item-btn btn-black display-7" target="_blank">Start Now
                                    &gt;</a></div>
                        </div>
                    </div>
                    <div class="item features-image сol-12 col-md-6 col-lg-4">
                        <div class="item-wrapper">
                            <div class="item-img">
                                <img src="assets/images/original-patungsuroboyoheader.jpg" alt="" title="">
                            </div>
                            <div class="item-content">
                                <h5 class="item-title mbr-fonts-style display-5"><strong>Surabaya</strong></h5>
                            </div>
                            <div class="mbr-section-btn item-footer mt-2"><a href="<?php echo base_url().'hotelsurabaya'; ?>" class="btn item-btn btn-black display-7" target="_blank">Start Now
                                    &gt;</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="features19 cid-szL2ORnKF1" id="features20-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-9">
                        <div class="card-wrapper pb-4">
                            <div class="card-box align-center">
                                <h4 class="card-title mbr-fonts-style mb-4 display-2"><strong>Cara Booking Hotel</strong></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="item mbr-flex">
                            <div class="icon-box">
                                <span class="step-number mbr-fonts-style display-5">1</span>
                            </div>
                            <div class="text-box">
                                <h4 class="icon-title card-title mbr-black mbr-fonts-style display-7">
                                    <strong>Register</strong></h4>
                                <h5 class="icon-text mbr-black mbr-fonts-style display-4">Register atau login untuk dapat membooking hotel</h5>
                            </div>
                        </div>
                        <div class="item mbr-flex">
                            <div class="icon-box">
                                <span class="step-number mbr-fonts-style display-5">2</span>
                            </div>
                            <div class="text-box">
                                <h4 class="icon-title card-title mbr-black mbr-fonts-style display-7"><strong>Pilih hotel</strong></h4>
                                <h5 class="icon-text mbr-black mbr-fonts-style display-4">Pilih hotel di tempat tujuan anda yang kami dukung dengan harga yang sangat miring&nbsp;</h5>
                            </div>
                        </div>
                        <div class="item mbr-flex">
                            <div class="icon-box">
                                <span class="step-number mbr-fonts-style display-5">3</span>
                            </div>
                            <div class="text-box">
                                <h4 class="icon-title card-title mbr-black mbr-fonts-style display-7">
                                    <strong>Isi formulir</strong></h4>
                                <h5 class="icon-text mbr-black mbr-fonts-style display-4">Isi identitas tamu, jumlah kamar, dan tanggal booking kamar</h5>
                            </div>
                        </div>
                        <div class="item mbr-flex last">
                            <div class="icon-box">
                                <span class="step-number mbr-fonts-style display-5">4</span>
                            </div>
                            <div class="text-box">
                                <h4 class="icon-title card-title mbr-black mbr-fonts-style display-7">
                                    <strong>Dapatkan invoice</strong></h4>
                                <h5 class="icon-text mbr-black mbr-fonts-style display-4">Anda akan mendapatkan invoice di dashboard user untuk ditunjukan saat akan check in hotel</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer7 cid-szL3026xFg" once="footers" id="footer7-4">
            <div class="container">
                <div class="media-container-row align-center mbr-white">
                    <div class="col-12">
                        <p class="mbr-text mb-0 mbr-fonts-style display-7">
                            © Hoster! - Universitas Multimedia Nusantara</p>
                    </div>
                </div>
            </div>
        </section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"> <a href="https://mobirise.site/y" style="color:#aaa;"></a> </p></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  
    </body>
</html>