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

    <title>Hotel List</title>
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
    <link href="assets/css/hotel-list.css" rel="stylesheet">

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
                    <h2>List of Hotels</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Inner Page</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="hotel-list">
            <div class="container">
                <?php $sql = "SELECT * from hotels";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                        <div class="hotel-item">
                            <a href="hotel-details.php?htl_id=<?php echo htmlentities($result->htl_id); ?>">
                                <img src="admin/img/htlimage/<?php echo htmlentities($result->htl_image); ?>" class="hotel-img">
                            </a>
                            <div class="content">
                                <h4>Hotel Name: <?php echo htmlentities($result->htl_name); ?></h4>
                                <h6>Hotel Location: <?php echo htmlentities($result->htl_location); ?></h6>
                                <br>
                                <a href="hotel-details.php?htl_id=<?php echo htmlentities($result->htl_id); ?>" class="goto-button">go to page</a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </section>

    </main><!-- End #main -->

    <!--INCLUDE FOOTER AND VENDORJS FILE-->
    <?php include('assets/includes/footer.php'); ?>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

</html>
