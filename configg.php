<!-- DB connection 2 -->
<?php

$con = mysqli_connect("localhost", "root", "", "demo");

if (mysqli_connect_error()) {
    echo "Failed to connect " . mysqli_connect_errno();
}
?>