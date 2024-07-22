<?php
				
		include "config.php";

		if(isset($_POST['submit'])){

				$username = mysqli_real_escape_string($conn,$_POST['username']);
				$password = mysqli_real_escape_string($conn,$_POST['password']);

			if ($username != "" && $password != ""){
		
					$sql="SELECT * FROM db_admin WHERE username='$username' AND password='$password'";
					$result = $conn->query($sql);
					$row = $result->fetch_row();
					if(!$row) {
						echo "<p style='color:red;'>Invalid username or password!</p>";
					}
					else {
						session_start();
						$_SESSION['user']=$username;
						header('location:adminpanel.php');
					}
				}
			}
				
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frama Nura Pvt. Ltd| Login</title>
    <link rel='stylesheet' href='login_style.css'>
</head>
<body>

    <div class="container">
    <h2 class="text-center">ADMIN LOGIN</h2>
        <div class="col-md-5 mx-auto">
            <div class="card card-body">

                <form action="<?=$_SERVER['PHP_SELF']?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required value="">
                    </div>
                    <div class="form-group pt-1">
                        <button class="admin-login-button" type="submit" name="submit">Login</button>
                    </div>
                    <a class="login" href="login.php">Login</a> 
                </form>
            </div>
        </div>
    </div>
</body>
</html>
