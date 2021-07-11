<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:dashboard.php');
} else {
	$pid = intval($_GET['pid']);
	if (isset($_POST['submit'])) {
		$pname = $_POST['packagename'];
		$ptype = $_POST['packagetype'];
        $photel = $_POST['packagehotel'];
		$pprice = $_POST['packageprice'];
		$pfeatures = $_POST['packagefeatures'];
		$pdetails = $_POST['packagedetails'];
		$pimage = $_FILES["packageimage"]["name"];
		$sql = "update packages set pkg_name=:pname,pkg_type=:ptype,htl_id=:photel,pkg_price=:pprice,pkg_features=:pfeatures,pkg_details=:pdetails where pkg_id=:pid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':pname', $pname, PDO::PARAM_STR);
		$query->bindParam(':ptype', $ptype, PDO::PARAM_STR);
        $query->bindParam(':photel', $photel, PDO::PARAM_STR);
		$query->bindParam(':pprice', $pprice, PDO::PARAM_STR);
		$query->bindParam(':pfeatures', $pfeatures, PDO::PARAM_STR);
		$query->bindParam(':pdetails', $pdetails, PDO::PARAM_STR);
		$query->bindParam(':pid', $pid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Package Updated Successfully";
	}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Update Package</title>
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
                <div class="col-sm-3 sidenav hidden-xs">
                    <br>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="manage-hotels.php">Manage Hotels</a></li>
                        <li class="active"><a href="manage-packages.php">Manage Packages</a></li>
                        <li><a href="manage-bookings.php">Manage Bookings</a></li>
                    </ul><br>
                </div>
                <br>

                <div class="col-sm-9">
                    <div class="well">
                        <h4>Update Package</h4><br>
                        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">

                                <?php
                                $hid = intval($_GET['pid']);
                                $sql = "SELECT * from packages where pkg_id=:pid";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':pid', $pid, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>

                                        <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" name="packagename" id="packagename" placeholder="name of package" value="<?php echo htmlentities($result->pkg_name); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder="standard/premier/luxury" value="<?php echo htmlentities($result->pkg_type); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Hotel Id</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" name="packagehotel" id="packagehotel" placeholder="id of hotel associated with package" value="<?php echo htmlentities($result->htl_id); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder="price of package" value="<?php echo htmlentities($result->pkg_price); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" name="packagefeatures" id="packagefeatures" placeholder="features of the package" value="<?php echo htmlentities($result->pkg_features); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" name="packagedetails" id="packagedetails" placeholder="details of the package" value="<?php echo htmlentities($result->pkg_details); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
                                                <div class="col-sm-8">
                                                    <img src="img/pkgimage/<?php echo htmlentities($result->pkg_image); ?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-pkg-image.php?imgid=<?php echo htmlentities($result->pkg_id); ?>">Change Image</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Last Updation Date</label>
                                                <div class="col-sm-8">
                                                    <?php echo htmlentities($result->update_date); ?>
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