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
                                <th>Location</th>
                                <th>Price</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sql = "SELECT * from TblTourPackages";
                            $query = $dbh->prepare($sql);
                            //$query -> bindParam(':city', $city, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {                ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result->PackageName); ?></td>
                                        <td><?php echo htmlentities($result->PackageType); ?></td>
                                        <td><?php echo htmlentities($result->PackageLocation); ?></td>
                                        <td>$<?php echo htmlentities($result->PackagePrice); ?></td>
                                        <td><?php echo htmlentities($result->Creationdate); ?></td>
                                        <td><a href="update-package.php?pid=<?php echo htmlentities($result->PackageId); ?>"><button type="button" class="btn btn-primary btn-block">View Details</button></a></td>
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