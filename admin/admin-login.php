<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $pass = md5($_POST['password']);
    $sql = "SELECT username,password FROM admin WHERE username=:uname and password=:pass";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':pass', $pass, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {

        echo "<script>alert('Invalid Password/Username');</script>";
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }
        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="name" placeholder="" required="">
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="password" placeholder="" required="">
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="login" value="Login">
            </div>
            <div class="clearfix"></div>
        </form>
        <div class="back">
            <a href="../index.php">Back to home</a>
        </div>

    </div>
</body>

</html>