<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:dashboard.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Packages</title>
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
                    <li><a href="manage-hotels.php">Manage Hotels</a></li>
                    <li class="active"><a href="manage-packages.php">Manage Packages</a></li>
                    <li><a href="manage-bookings.php">Manage Bookings</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="well">
                    <h4>Manage Packages</h4><br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Hotel</th>
                                <th>Price</th>
                                <th>Features</th>
                                <th>Details</th>
                                <th>Image</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sql = "SELECT packages.pkg_id as pid,pkg_name as pname,pkg_type as type,pkg_price as price,pkg_features as features,pkg_details as details, pkg_image as image, packages.creation_date as pcreate, hotels.htl_name as hname from packages join hotels on hotels.htl_id=packages.htl_id";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result->pname); ?></td>
                                        <td><?php echo htmlentities($result->type); ?></td>
                                        <td><?php echo htmlentities($result->hname); ?></td>
                                        <td>$<?php echo htmlentities($result->price); ?></td>
                                        <td><?php echo htmlentities($result->features); ?></td>
                                        <td><?php echo htmlentities($result->details); ?></td>
                                        <td><?php echo htmlentities($result->image); ?></td>
                                        <td><?php echo htmlentities($result->pcreate); ?></td>
                                        <td><a href="update-package.php?pid=<?php echo htmlentities($result->pid); ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                                    </tr>
                            <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php } ?>