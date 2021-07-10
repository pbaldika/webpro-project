<!-- To connect with server -->
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

  <title>Package Detail Page</title>
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


  <script>
    new WOW().init();
  </script>
  <script src="js/jquery-ui.js"></script>
  <script>
    $(function() {
      $("#datepicker,#datepicker1").datepicker();
    });
  </script>
</head>

<body>

  <!--INCLUDE HEADER AND TOPBAR FILE-->
  <?php include('assets/includes/header.php'); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Package Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="package-list.php">Package List</a></li>
            <li>Package Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Package Details Section ======= -->

    <!-- End Package Details Section -->


  </main><!-- End #main -->

  <!--INCLUDE FOOTER AND VENDORJS FILE-->
  <?php include('assets/includes/footer.php'); ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

</html>
