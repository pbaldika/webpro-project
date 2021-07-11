<?php
session_start();
error_reporting(0);
include('assets/includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Quarantine Hotel Booking</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v2.3.1
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!--INCLUDE HEADER AND TOPBAR FILE-->
  <?php include('assets/includes/header.php');?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/hotelroom.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Quarantine Accomodation</h2>
              <p class="animate__animated animate__fadeInUp">Need a hotel to quarantine?</p>
              <a href="package-list.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Start Booking</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/airport.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Our Locations</h2>
              <p class="animate__animated animate__fadeInUp">Various branches of our hotel are available to stay for your quarantine period.</p>
              <a href="hotel-list.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/pcr.jpeg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Medical Services</h2>
              <p class="animate__animated animate__fadeInUp">COVID19 medical assistance at every hotel.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= Featured Services Section ======= -->
  <!--  
  <section id="featured-services" class="featured-services section-bg">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="icofont-computer"></i></div>
            <h4 class="title"><a href="">Featured Service 1</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="icofont-image"></i></div>
            <h4 class="title"><a href="">Featured Service 2</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="icofont-tasks-alt"></i></div>
            <h4 class="title"><a href="">Featured Service 3</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trade stravi</p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Featured Services Section -->

  
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Quarantine Packages</h2>
        <p>We offer the most affordable deals for Quarantine in Malaysia. Browse our packages below to see what suits you.</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">

            <!-- <li data-filter=".filter-card">Card</li> -->
            
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/pkg_image/package1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Package 1</h4>
              <p>Standard</p>
              <div class="portfolio-links">
                <a href="package-details.php?pkg_id=1" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/pkg_image/package2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Package 2</h4>
              <p>Premier</p>
              <div class="portfolio-links">
                <a href="package-details.php?pkg_id=2" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/pkg_image/package3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Package 3</h4>
              <p>Luxury</p>
              <div class="portfolio-links">
                 <a href="package-details.php?pkg_id=3" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-left">
          <h3>Book Your Quarantine Now</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="package-list.php">Choose A Package</a>
        </div>
      </div>

    </div>
  </section><!-- End Cta Section -->

  

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container">

      <div class="row no-gutters">

        

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= Our Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container">

      <div class="section-title">
        <h2>Our Partners</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="owl-carousel clients-carousel">
       
        <img src="assets/img/clients/aston-logo-color.png" alt="">
        <img src="assets/img/clients/novotel.png" alt="">
        <img src="assets/img/clients/ritzcarlton.png" alt="">
        <img src="assets/img/clients/accorshottel.png" alt="">
        <img src="assets/img/clients/hyatt.png" alt="">
        <img src="assets/img/clients/hilton.png" alt="">
      </div>

    </div>
  </section><!-- End Our Clients Section -->

  </main><!-- End #main -->

  <!--INCLUDE FOOTER AND VENDORJS FILE-->
  <?php include('assets/includes/footer.php');?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

</html>
