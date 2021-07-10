<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 1) {
    header('location:dashboard.php');
} else {
    // code for cancel
    if (isset($_REQUEST['bkid'])) {
        $bid = intval($_GET['bkid']);
        $status = 1;
        $sql = "UPDATE booking SET status=:status WHERE booking_id=:bid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':bid', $bid, PDO::PARAM_STR);
        $query->execute();

        $msg = "Booking Cancelled successfully";
    }

    if (isset($_REQUEST['bckid'])) {
        $bcid = intval($_GET['bckid']);
        $status = 0;
        $sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':bcid', $bcid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Booking Confirm successfully";
    }
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
                    <h2>System Admin</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="manage-hotels.php">Manage Hotels</a></li>
                        <li><a href="manage-packages.php">Manage Packages</a></li>
                        <li class="active"><a href="manage-bookings.php">Manage Bookings</a></li>
                    </ul><br>
                </div>
                <br>

                <div class="col-sm-9">
                    <div class="well">
                        <h4>Manage Bookings</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Booking id</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Package</th>
                                    <th>From/To </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sql = "SELECT booking.booking_id as bookid,full_name as fname,phone as mnumber,email as email,packages.pkg_name as pckname,packages.pkg_id as pid,booking.in_date as fdate,booking.out_date as tdate,booking.status as status, from booking join packages on packages.pkg_id=booking.pkg_id";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>
                                        <tr>
                                            <td>#BK-<?php echo htmlentities($result->bookid); ?></td>
                                            <td><?php echo htmlentities($result->fname); ?></td>
                                            <td><?php echo htmlentities($result->mnumber); ?></td>
                                            <td><?php echo htmlentities($result->email); ?></td>
                                            <td><?php echo htmlentities($result->pckname); ?></a></td>
                                            <td><?php echo htmlentities($result->fdate); ?> to <?php echo htmlentities($result->tdate); ?></td>
                                            <td><?php 
                                                if ($result->status == 0) {
                                                    echo "Confirmed";
                                                }
                                                if ($result->status == 1) {
                                                    echo "Cancelled";
                                                }
                                                ?></td>
                                            <?php if ($result->status == 1) { ?>
                                                <td>Cancelled</td>
                                            <?php } else { ?>
                                                <td><a href="manage-bookings.php?bkid=<?php echo htmlentities($result->bookid); ?>" onclick="return confirm('Do you really want to cancel booking')">Cancel</a> / <a href="manage-bookings.php?bckid=<?php echo htmlentities($result->bookid); ?>" onclick="return confirm('booking has been confirmed')">Confirm</a></td>
                                            <?php } ?>
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