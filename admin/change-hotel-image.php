<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:dashboard.php');
} else {
    $imgid = intval($_GET['imgid']);
    if (isset($_POST['submit'])) {

        $himage = $_FILES["hotelimage"]["name"];
        move_uploaded_file($_FILES["hotelimage"]["tmp_name"], "img/htlimage/" . $_FILES["hotelimage"]["name"]);
        $sql = "update hotels set htl_image=:himage where htl_id=:imgid";
        $query = $dbh->prepare($sql);

        $query->bindParam(':imgid', $imgid, PDO::PARAM_STR);
        $query->bindParam(':himage', $himage, PDO::PARAM_STR);
        $query->execute();
        $msg = "Image Updated Successfully";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Change Hotel Image</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {
                height: 550px
            }

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
                width: auto;
            }

            /* On small screens, set height to 'auto' for the grid */
            @media screen and (max-width: 767px) {
                .row.content {
                    height: auto;
                }
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 col-md-2 sidebar">
                    <br>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="active"><a href="manage-hotels.php">Manage Hotels</a></li>
                        <li><a href="manage-packages.php">Manage Packages</a></li>
                        <li><a href="manage-bookings.php">Manage Bookings</a></li>
                        <li><a href="manage-enquiries.php">Manage Enquiries</a></li>
                    </ul><br>
                </div>
                <br>

                <div class="col-sm-9">
                    <div class="well">
                        <h4>Change Hotel Image</h4><br>
                        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <form class="form-horizontal" name="hotel" method="post" enctype="multipart/form-data">
                                    <?php
                                    $imgid = intval($_GET['imgid']);
                                    $sql = "SELECT htl_image from hotels where htl_id=:imgid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':imgid', $imgid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) { ?>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Hotel Image</label>
                                                <div class="col-sm-8">
                                                    <img src="img/htlimage/<?php echo htmlentities($result->htl_image); ?>" width="200">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                                <div class="col-sm-8">
                                                    <input type="file" name="hotelimage" id="hotelimage">
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="submit" class="btn-primary btn">Update</button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

    </body>

    </html>
<?php } ?>