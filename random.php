<?php
session_start();
require_once "config.php";
if (!isset($_SESSION["code_access"]) || $_SESSION["code_access"] !== true) {
    header("location: login.php");
    exit;
} else {


    $permitted_chars = '0123456789';

    $duration = floor(time() / (60 * 5));
    srand($duration);
    $_SESSION["codee"] = substr(str_shuffle($permitted_chars), 0, 6);

    date_default_timezone_set('Asia/Manila');

    $currentDate = date('Y-m-d H:i:s');
    $currentDate_timestamp = strtotime($currentDate);
    $endDate_months = strtotime("+5 minutes", $currentDate_timestamp);
    $packageEndDate = date('Y-m-d H:i:s', $endDate_months);

    $_SESSION["current"] = $currentDate;
    $_SESSION["expired"] = $packageEndDate;

    $user_id = $_SESSION["id"];
    $codee = $_SESSION["codee"];


    $sql = "INSERT INTO code (user_id, code, created_at, expiration) VALUES('$user_id', '$codee', '$currentDate', '$packageEndDate')";

    $result = mysqli_query($link, "select * from code where code='$codee'") or die('Error connecting to MySQL server');
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        if (mysqli_query($link, $sql)) {
        } else {
            echo "ERROR: $sql. " . mysqli_error($link);
        }
    } else {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<style>
    .code {
        font-size: 50px;
        text-align: center;
        font-weight: bold;
        color: black;
        padding: 20px 20px 20px 20px;
        margin: 20px;
        position: relative;
        top: 230px;
        left: 300px;
        background-color: gray;
        width: 50%;
    }
</style>

<body>
    <div class="code">
        <?php echo $_SESSION["codee"]; ?>
    </div>
    <center>
        <h3>*Generated code will change every 5mins</h3>
    </center>
</body>

</html>