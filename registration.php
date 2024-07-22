<?php 
require 'config.php';

if (isset($_POST["submit"])) {
    $employeeID = $_POST["E_ID"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["conformpassword"];

    $checkEmployee = mysqli_query($conn, "SELECT * FROM employee WHERE E_ID = '$employeeID'");
    if (mysqli_num_rows($checkEmployee) === 0) {
        echo "<script>alert('Employee ID not found');</script>";
    } else {
        $duplicate1 = mysqli_query($conn, "SELECT * FROM emplogin WHERE E_ID = '$employeeID'"); 
        if (mysqli_num_rows($duplicate1) > 0) { 
            echo "<script>alert('Employee ID is already taken');</script>";
        } else {
            $duplicate = mysqli_query($conn, "SELECT * FROM emplogin WHERE e_username = '$username'");
            if (mysqli_num_rows($duplicate) > 0) {
                echo "<script>alert('Username is already taken');</script>";
            } else {
                if ($password == $confirmpassword) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO emplogin (E_ID, e_username, e_pass) VALUES('$employeeID', '$username', '$hashedPassword')";
                    mysqli_query($conn, $query);
                    echo "<script>alert('Registration Successful');</script>";
                    $_SESSION["login"] = true;
                    $_SESSION["id"] = mysqli_insert_id($conn);
                    header("location: login.php");
                    exit;
                } else {
                    echo "<script>alert('Password does not match');</script>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Frama Nura Pvt. Ltd | About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
  </head>
  <body>
    <div class="container">
        <h2 class="text-center">Registration Form</h2>
        <div class="col-md-5 mx-auto">
            <div class="card card-body">
                <form class="" action="" method="post" autocomplete="off">
                    <label for="E_ID">Employee Id:</label>
                    <input type="text" name="E_ID" id="E_ID" required value=""><br>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required value=""><br>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required value=""><br>
                    <label for="conformpassword">Confirm Password:</label>
                    <input type="password" name="conformpassword" id="conformpassword" required value=""><br>

                    <button type="submit" name="submit">Register</button>
                </form> 
                <p class="small-xl pt-3 text-center">
                    <span class="text-muted">Already have an account?</span>
                    <a href="login.php">Sign in</a>
                </p>
                <a href="adminlogin.php">Admin</a> 
                <section></section>
            </div>
        </div>
    </div>
  </body>
</html>
