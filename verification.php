<?php

session_start();

if (!isset($_SESSION["verify"]) || $_SESSION["verify"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config.php";
require 'configg.php';


$code_err = "";
$_SESSION["code_access"] = true;

$username = $_SESSION["username"];



if (isset($_POST['login'])) {
    if (empty(trim($_POST["code"]))) {
        $code_err = "Please enter code";
    } else {

        date_default_timezone_set('Asia/Manila');
        $currentDate = date('Y-m-d H:i:s');
        $currentDate_timestamp = strtotime($currentDate);
        $code = $_POST['code'];


        $id_code = mysqli_query($link, "SELECT * FROM code WHERE code='$code' AND id_code=id_code") or die('Error connecting to MySQL server');
        $count = mysqli_num_rows($id_code);


        $servername = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'demo';


        $conn = new mysqli($servername, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT expiration FROM code where code='$code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<div style='display: none;'>" . "Expiration: " . $row["expiration"] . "<br>";
                echo $currentDate . "<br></div>";
                if (($row["expiration"]) > ($currentDate)) {
                    session_start();

                    $_SESSION["loggedin"] = true;

                    $getid = $_POST['getid'];
                    $_SESSION["getid"] = $getid;
                    $getusername = $_POST['getusername'];
                    $_SESSION["getusername"] = $getusername;

                    $query = mysqli_query($con, "INSERT INTO eventlog(username, transaction_type) VALUES('$username', 'Login')");

                    if (!$query) {
                        exit("error");
                    }
                    header("location: welcome.php");
                } else {
                    $code_err = 'Expired';
                }
            }
        } else {
            $code_err = 'Wrong Code';
        }



        // $conn->close();
    }

    // mysqli_close($link);
}
?>
<input type="text" name="getid" id="" value="<?php echo $_SESSION['id']; ?>" style="display: none;">
<input type="text" name="getusername" id="" value="<?php echo $_SESSION['username']; ?>" style="display: none;">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verification</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <div class="wrapper">
                    <h2>Verification</h2>
                    <p>Please fill in your Verification to login.</p>
                    <form role="form" method="post">
                        <div class="form-group <?php echo (!empty($code_err)) ? 'has-error' : ''; ?>">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control">
                            <span style="color:red !important;" class="help-block"><?php echo $code_err; ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
                            <a class="btn btn-warning" style="text-decoration: none; color: black;" href="random.php" target="_blank">GET MY CODE</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="image/code.png" alt="image" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>