<!DOCTYPE html>
<html  >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
        <meta name="description" content="">
        <title>Browster - About Us</title>
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
        <section class="menu menu1 cid-szL1pl871l" once="menu" id="menu1-5">
            <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
                <div class="container">
                    <div class="navbar-brand">
                        <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-5" href="<?php echo base_url().'home'; ?>">Browster!</a></span>
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
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?php echo base_url().'cekbarang'; ?>">Cek barang</a></li>
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
                            </li></ul>
                    </div>
                </div>
            </nav>
        </section>
        <section class="header13 cid-szL3vfClXa mbr-fullscreen mbr-parallax-background" id="header13-7">
            <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(53, 53, 53);"></div>
            <div class="align-center container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1"><strong>Tentang Browster!</strong></h1>
                        <p class="mbr-text mbr-fonts-style mb-3 display-7">
                            Browster siap melayani anda untuk memenuhi kebutuhan anda. Dengan Browster anda dapat pinjam barang dengan cepat dan mudah. Pilihan barang yang ada di Browster juga sangat banyak dan bervariasi. Cepat pilih barang kesukaanmu dan check out!!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="team1 cid-szL3DAhuN3" id="team1-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                            <strong>Meet Our team</strong>
                        </h3>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card-wrap">
                            <div class="image-wrap">
                                <img src="assets/images/me.jpg" alt="">
                            </div>
                            <div class="content-wrap">
                                <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                                    <strong>Matthew Brandon Dani</strong></h5>
                                <h6 class="mbr-role mbr-fonts-style align-center mb-3 display-4"><strong>Frontend and backend developer</strong></h6>
                                <p class="card-text mbr-fonts-style align-center display-7">
                                    00000036391
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card-wrap">
                            <div class="image-wrap">
                                <img src="assets/images/adrian.jpg" alt="">
                            </div>
                            <div class="content-wrap">
                                <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                                    <strong>Muhammad Adrian Maulana</strong></h5>
                                <h6 class="mbr-role mbr-fonts-style align-center mb-3 display-4"><strong>Frontend developer</strong></h6>
                                <p class="card-text mbr-fonts-style align-center display-7">
                                    00000036391
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card-wrap">
                            <div class="image-wrap">
                                <img src="assets/images/ahmad.jpg" alt="">
                            </div>
                            <div class="content-wrap">
                                <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                                    <strong>Ahmad Buchori Wibowo</strong></h5>
                                <h6 class="mbr-role mbr-fonts-style align-center mb-3 display-4"><strong>Frontend developer</strong></h6>
                                <p class="card-text mbr-fonts-style align-center display-7">
                                    00000036391
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="header6 cid-szL5pjD7dv mbr-fullscreen mbr-parallax-background" id="header6-9">
            <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
            <div class="align-center container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong>Tunggu apa lagi?</strong></h1>
                        <p class="mbr-text mbr-white mbr-fonts-style display-7">
                            Ayo pilih barang yang kamu inginkan! keburu kehabisan loh...</p>
                        <div class="mbr-section-btn mt-3"><a class="btn btn-danger display-4" href="<?php echo base_url().'cekbarang'; ?>">Cek barang</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer7 cid-szL3026xFg" once="footers" id="footer7-6">
            <div class="container">
                <div class="media-container-row align-center mbr-white">
                    <div class="col-12">
                        <p class="mbr-text mb-0 mbr-fonts-style display-7">
                            © Browster! - Universitas Multimedia Nusantara</p>
                    </div>
                </div>
            </div>
        </section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="https://mobirise.site/b" style="color:#aaa;"></a></p></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/parallax/jarallax.min.js"></script>  <script src="assets/theme/js/script.js"></script>  
    </body>
</html>