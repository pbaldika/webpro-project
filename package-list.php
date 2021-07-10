
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

  <title>Inner Page</title>
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
  <link href="assets/css/package-list.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v2.3.1
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!--INCLUDE HEADER AND TOPBAR FILE-->
  <?php include('assets/includes/header.php'); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Package List</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    <div class="rooms">
      <div class="container">

        <div class="room-bottom">
          <h3>Package List</h3>

          <!-- This is to list the packages based on the table of packages form the quarantine database -->
          <!-- The info will be retrieved from the packkage table -->
          <?php $sql = "SELECT * from packages";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {  ?>

              <div class="package-item">
                <a href="package-details.php?pkg_id">
                  <img src="assets/img/pkg_image/<?php echo htmlentities($result->pkg_image); ?>" class="package-img" height="165px" width="200px">
                </a>
                <div class="content">
                  <a href="package-details.php?pkg_id">
                    
                  <h4><?php echo htmlentities($result->pkg_name); ?></h4>
                  </a>
                  <p><?php echo htmlentities($result->pkg_details); ?></p>
                  <br>
                </div>
              </div>
          <?php }
          } ?>
  </main>
  <!--INCLUDE FOOTER AND VENDORJS FILE-->
  <?php include('assets/includes/footer.php'); ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>



</body>

</html>
