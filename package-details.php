<!-- To connect with server -->
<?php
session_start();
error_reporting(0);
include('assets/includes/config.php');

if (isset($_POST['submit'])) {
  $pid = intval($_GET['pkgid']);
  $fname = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $sql = "INSERT INTO booking(pkg_id,full_name,email,phone,in_date,out_date,status) VALUES(:pid,:fname,:email,:phone,:fromdate,:todate,0)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':pid', $pid, PDO::PARAM_STR);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':phone', $phone, PDO::PARAM_STR);
  $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Booked Successfully";
  } else {
    $error = "Something went wrong. Please try again";
  }
}
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

  <!-- Datepicker script and bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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

    <!-- coba php -->
    <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
    <?php
    $pid = intval($_GET['pkg_id']);
    $sql = "SELECT * from packages where pkg_id=:pid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $result) {  ?>

        <section id="portfolio-details" class="portfolio-details">

          <div class="container">
            <h2><b><?php echo htmlentities($result->pkg_name); ?></b> </h2> <br>

            <div class="portfolio-details-container">

              <div>
                <img src="admin/img/pkgimage/<?php echo htmlentities($result->pkg_image); ?>" class="img-fluid" alt="">
              </div>

              <div class="portfolio-info">
                <h3>Package information</h3>
                <ul>
                  <li><strong>Price:</strong> <?php echo htmlentities($result->pkg_price); ?> MYR</li>
                  <li><strong>Type:</strong> <?php echo htmlentities($result->pkg_type); ?></li>
                </ul>
              </div>

            </div>

            <div class="portfolio-description">
              <h2>Package Details</h2>
              <p>
                <?php echo htmlentities($result->pkg_details); ?>
              </p>

              <br>

              <h2>Package Features</h2>
              <p>
                <?php echo htmlentities($result->pkg_features); ?>
              </p>


              <!-- Booking section  -->
              <section id="booking" class="contact">
                <h2>Book Now</h2>
                <form name="booking" method="post" class="php-email-form" name="bookinsgform">
                  <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                  <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Your Email</label>
                      <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                      <div class="validate"></div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Your Phone</label>
                      <input type="text" name="phone" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter valid phone number" />
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="form-row">

                    <div action="/action_page.php" class="form-group col-md-6">
                      <label for="from">Date From:</label>
                      <input type="date" id="from" name="fromdate">
                    </div>

                    <div action="/action_page.php" class="form-group col-md-6">
                      <label for="to">Date To:</label>
                      <input type="date" id="to" name="todate">
                    </div>
                    
                  </div>
                  <div class="text-center"><button type="submit" name="submit">Create Booking</button></div>
                </form>
              </section>
              <!-- Booking section  -->

            </div>
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
