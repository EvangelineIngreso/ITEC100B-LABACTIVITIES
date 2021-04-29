<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
if (isset($_POST['reset'])) {
    $getid = $_POST['getid'];
    $_SESSION["getid"] = $getid;
    $getusername = $_POST['getusername'];
    $_SESSION["getusername"] = $getusername;

    header("location: reset-password.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <img style="height:450px !important;" src="image/welcome.png" alt="image" class="img-fluid">
            </div>
        </div>
    </div>
    <h1 class="my-5">Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our site.</h1>
    <p>
    <form action="" method="post">
        <input type="text" name="getid" id="" value="<?php echo $_SESSION['id']; ?>" style="display: none;">
        <input type="text" name="getusername" id="" value="<?php echo $_SESSION['username']; ?>" style="display: none;">
        <input type="submit" name="reset" class="btn btn-warning" value="Change Password"></input>
    </form>
    <a href="logout.php" class="btn btn-danger">Sign Out Your Account</a>
    </p>

</body>

</html>