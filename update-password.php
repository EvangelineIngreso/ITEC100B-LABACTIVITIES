<?php
include("configg.php");

if (!isset($_GET["code"])) {
    exit("can't find page");
}

$code = $_GET["code"];
$getEmailQuery = mysqli_query($con, "SELECT email FROM forgetpass where code='$code'");
if (mysqli_num_rows($getEmailQuery) == 0) {
    exit("can't find page");
}

if (isset($_POST["password"])) {
    $pw = $_POST["password"];
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    // fetch data array
    $row = mysqli_fetch_array($getEmailQuery);

    $email  = $row["email"];

    $query = mysqli_query($con, "UPDATE users SET password='$pw' WHERE email='$email' ");

    if ($query) {
        mysqli_query($con, "INSERT INTO eventlog(username, transaction_type) VALUES('$email', 'Forget Password(Success)')");
        $query = mysqli_query($con, "DELETE FROM forgetpass WHERE code='$code'");
        if (!$query) {
            exit("error");
        }
        exit("<h1>Password Updated <a href='login.php'>Go home</a></h1>");
    } else {
        exit("Something went wrong");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>

    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div style="margin-top: 100px;" class="col-md-4">
                <form action="" method="POST">
                    <h1>Forget Password?</h1>
                    <input class="form-control" type="password" name="password" placeholder="New Password">
                    <center><input class="btn btn-primary" type="submit" name="submit" value="Update password">
                    </center>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>

</body>

</html>