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
            <li><a href="hotel-list.php">Locations</a></li>
            <li>Hotel Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Package Details Section ======= -->

    <!-- End Package Details Section -->

    <!-- coba php -->
    <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
    <?php
    $pid = intval($_GET['htl_id']);
    $sql = "SELECT * from hotels where htl_id=:pid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $result) {  ?>


        <!-- Start of Hotel Details -->
        <section id="portfolio-details" class="portfolio-details">

          <div class="container">
            <h2><b><?php echo htmlentities($result->htl_name); ?></b> </h2> <br>

            <div class="portfolio-details-container">

              <div>
                <img src="admin/img/htlimage/<?php echo htmlentities($result->htl_image); ?>" class="img-fluid" alt="">
              </div>

              <div class="portfolio-info">
                <h3>Hotel information</h3>
                <ul>
                  <li><strong>Location:</strong> <?php echo htmlentities($result->htl_location); ?></li>
                </ul>
              </div>

            </div>

            <div class="portfolio-description">
              <br>

              <h2>Package list</h2>
              <br>

            </div>
            <!-- End of Hotel Details -->

            <!-- Start of Package List -->
            <?php $sql = "SELECT * from packages";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {  ?>

                <div class="package-item">
                  <img src="admin/img/pkgimage/<?php echo htmlentities($result->pkg_image); ?>" class="package-img" height="350px" width="auto">
                  <div class="content">
                    <br>
                    <a href="package-details.php?pkg_id=<?php echo htmlentities($result->pkg_id); ?>">
                      <h4><?php echo htmlentities($result->pkg_name); ?></h4>
                    </a>
                    <p><?php echo htmlentities($result->pkg_details); ?></p>
                    <br>
                  </div>
                </div>
            <?php }
            } ?>
            <!-- End of Package List -->

          </div>


        </section>
    <?php }
    } ?>
  </main><!-- End #main -->

  <!--INCLUDE FOOTER AND VENDORJS FILE-->
  <?php include('assets/includes/footer.php'); ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

</html>