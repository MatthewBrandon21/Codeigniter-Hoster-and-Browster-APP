<!DOCTYPE html>
<html  >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
        <meta name="description" content="">
        <title>Hoster - List Hotel</title>
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
        <section class="menu menu1 cid-szL1pl871l" once="menu" id="menu1-a">
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
        <section class="info3 cid-szLcScI3aJ mbr-parallax-background" id="info3-d">
            <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(68, 121, 217);">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card col-12 col-lg-10">
                        <div class="card-wrapper">
                            <div class="card-box align-center">
                                <h4 class="card-title mbr-fonts-style align-center mb-4 display-1">
                                    <strong>Pilih Hotelmu !</strong></h4>
                                <p class="mbr-text mbr-fonts-style mb-4 display-7">
                                    Kami kerja sama dengan lebih dari 100 hotel di banyak tempat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features8 cid-szLd4FhmFW" xmlns="http://www.w3.org/1999/html" id="features9-e">
            <div class="container">
                <?php $no=1; foreach($hotel as $h){ ?>
                <div class="card">
                    <div class="card-wrapper">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <div class="image-wrapper">
                                    <?php echo '<img src="'. base_url().'uploads/'.$h->hotel_foto.'"></img>'; ?>
                                </div>
                            </div>
                            <div class="col-12 col-md">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md">
                                            <h3>
                                                <strong><?php echo $h->hotel_nama; ?></strong>
                                            </h3>
                                            </br>
                                            <h1>
                                            <?php
                                                for ($x = 0; $x < $h->hotel_bintang; $x++) {
                                                    echo "*";
                                                }
                                            ?>
                                            </h1>
                                            <br>
                                            <p class="mbr-text mbr-fonts-style display-7">
                                            <?php echo $h->hotel_deskripsi; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-auto">
                                            <p class="price mbr-fonts-style display-2"><?php echo 'Rp. '.number_format($h->hotel_harga); ?></p>
                                            <div class="mbr-section-btn"><a href="<?php echo base_url().'frontend/dashboard/booking_add/'.$h->hotel_id; ?>" class="btn btn-primary display-4">
                                                    Book Now
                                                </a></div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <section class="footer7 cid-szL3026xFg" once="footers" id="footer7-b">
            <div class="container">
                <div class="media-container-row align-center mbr-white">
                    <div class="col-12">
                        <p class="mbr-text mb-0 mbr-fonts-style display-7">
                            © Hoster! - Universitas Multimedia Nusantara</p>
                    </div>
                </div>
            </div>
        </section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="https://mobirise.site/g" style="color:#aaa;"></a></p></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/parallax/jarallax.min.js"></script>  <script src="assets/theme/js/script.js"></script>  
    </body>
</html>