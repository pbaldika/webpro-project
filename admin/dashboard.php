<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:dashboard.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Dashboard</title>
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
                        <li class="active"><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="manage-hotels.php">Manage Hotels</a></li>
                        <li><a href="manage-packages.php">Manage Packages</a></li>
                        <li><a href="manage-bookings.php">Manage Bookings</a></li>
                        <li><a href="manage-bookings.php">Manage Enquiries</a></li>
                    </ul><br>
                </div>
                <br>

                <div class="col-sm-9">
                    <div class="well">
                        <h4>Dashboard</h4>

                        <div class=logout-button>
                            <a href="admin-logout.php"><button type="button" class="btn btn-default">Logout</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="well">
                                <h4>Total Quarantine Packages</h4>
                                <?php $sql3 = "SELECT pkg_id from packages";
                                $query3 = $dbh->prepare($sql3);
                                $query3->execute();
                                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                $cnt3 = $query3->rowCount();
                                ?>
                                <h4><?php echo htmlentities($cnt3); ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="well">
                                <h4>Total Hotels</h4>
                                <?php $sql3 = "SELECT htl_id from hotels";
                                $query3 = $dbh->prepare($sql3);
                                $query3->execute();
                                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                $cnt3 = $query3->rowCount();
                                ?>
                                <h4><?php echo htmlentities($cnt3); ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="well">
                                <h4>Total bookings</h4>
                                <?php $sql3 = "SELECT booking_id from booking";
                                $query3 = $dbh->prepare($sql3);
                                $query3->execute();
                                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                $cnt3 = $query3->rowCount();
                                ?>
                                <h4><?php echo htmlentities($cnt3); ?></h4>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </body>

    </html>

<?php } ?>