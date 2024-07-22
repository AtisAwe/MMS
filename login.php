<?php
require "config.php";

if (isset($_POST['submit'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);

    if ($uname != "" && $password != "") {
        $sql = "SELECT e_id, e_pass FROM emplogin WHERE e_username='$uname'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (!$row) {
                echo "<script> alert('Invalid username or password!');</script>";
            } else {
                $hashedPassword = $row['e_pass'];
                if (password_verify($password, $hashedPassword)) {
                    $e_id = $row['e_id'];
                    $_SESSION['user'] = $uname;
                    $_SESSION['e_id'] = $e_id;
                    header("location: userinterface.php");
                }
            }
        } else {
            echo "<script> alert('User not registered');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farma Nura Pvt Ltd. | Login</title>
    <link rel='stylesheet' href='login_style2.css'>
</head>
<body>
    <div class="container">
        <h2 class="text-center">LOGIN</h2>
        <div class="col-md-5 mx-auto">
            <div class="card card-body">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group">
                        <label for="username">Username :</label>
                        <input type="text" class="textbox" id="uname" name="uname" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="textbox" id="pwd" name="pwd" placeholder="Password" />
                    </div>
                    <div class="form-group pt-1">
                        <button class="login-button" type="submit" name="submit">Login</button>
                    </div>
                </form>
                <p class="small-xl pt-3 text-center">
                    <span class="text-muted">Not a member?</span>
                    <a href="registration.php">Sign up</a>
                </p>
                <a class="admin" href="adminlogin.php">Admin</a> 
            </div>
        </div>
    </div>
</body>
</html>
