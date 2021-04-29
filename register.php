<?php

require_once "config.php";
require 'configg.php';

$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST["password"];

    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
    } else {
        $email = $_POST["email"];
    }

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {

        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    if (empty($password)){
        $password_err = "Please enter a password.";
    }
    else if (strlen($password) <= 8){
        $password_err = "Password must contain atleast 8 characters.";
    }
    else if (!preg_match("#[A-Z]+#", $password)){
        $password_err = "Password must contain 1 Uppercase character.";
    }
    else if (!preg_match("#[a-z]+#", $password)){
        $password_err = "Password must contain 1 Lowercase character.";
    }
    else if (!preg_match("#[0-9]+#", $password)){
        $password_err = "Password must contain 1 Numbers.";
    }
    elseif (!preg_match("#[\W]+#", $password)){
        $password_err = "Password must contain 1 Special characters.";
    }
    else{
        // no error if they follow the password format
    }






    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $password_err = "Password did not match.";
        }
    }




    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {


        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);


            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {


                $query = mysqli_query($con, "INSERT INTO eventlog(username, transaction_type) VALUES('$username', 'Registration')");

                if (!$query) {
                    exit("error");
                }
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
                    <h2>Sign Up</h2>
                    <p>Please fill this form to create an account.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <img src="image/user.png" alt="user" width="25px" height="25px">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span style="color: red !important;" class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <img src="image/lock.png" alt="user" width="25px" height="25px">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span style="color: red !important;" class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <img src="image/repass.png" alt="user" width="25px" height="25px">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" value="">
                            <span style="color: red !important;" class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <img src="image/email.png" alt="user" width="25px" height="25px">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                            <span style="color: red !important;" class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <!-- <input type="reset" class="btn btn-secondary" value="Reset"> -->
                        </div>
                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="image/signup.png" alt="image" class="img-fluid">
            </div>
        </div>
    </div>

</body>

</html>