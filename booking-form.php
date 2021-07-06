<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Booking Form</title>
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
  <link href="assets/css/booking-form.css" rel="stylesheet">  

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

  <main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Booking For Package Name A</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <form action="" method="post" role="form" class="booking-form">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Your Name</label>
          <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
          <div class="validate"></div>
        </div>
        <div class="form-group col-md-6">
          <label for="name">Your Email</label>
          <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
          <div class="validate"></div>
        </div>
      </div>
            
      <div class="form-group">
        <label for="name">Address</label>
        <input type="text" class="form-control" name="address" id="address" data-rule="minlen:8" data-msg="Please enter at least 8 chars of subject" />
        <div class="validate"></div>
      </div>

      <div class="form-group">
        <label for="name">Select Hotel Branch</label>
        <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
        <div class="validate"></div>
      </div>

            <div class="text-center"><button type="submit">Create Booking</button></div>

          </form>

  </main><!-- End #main -->

  <!--INCLUDE FOOTER AND VENDORJS FILE-->
  <?php include('assets/includes/footer.php');?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

</html>