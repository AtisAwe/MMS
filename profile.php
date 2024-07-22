<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <link rel="stylesheet" type="text/css" href="userface.css">   
</head>
<body>
<div class="header">
    <h1>Medicine Management System</h1>   
</div>
<header>
    <nav>
        <div class="left-nav">
            <ul>
                <li><a href="supplierlist.php" name="supplierlist">Supplier List</a></li>
                <li><a href="inventorylist.php" name="inventorylist">Inventory List</a></li>
                <li><a href="uipos2.php" name="saleslist">Sales List</a></li>
            </ul>
        </div>
        <ul>
            <li><a href="userinterface.php" name="home">Home</a></li>
            <li><a href="aboutus.php" name="about">About</a></li>
            <li><a href="contact.php" name="contact">Contact</a></li>
            <li><a href="profile.php" name="profile">Profile</a></li>
            <li><a href="logout.php" name="logout">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <div class="bodyarea">
            <div class="description">
                <div class="profile-container">
                    <h2>Your Profile</h2>
                    <div class="profile-info">
                    <?php
                        
                        include "config.php";
                        
                        if (isset($_SESSION["e_id"])) {
                            $e_id = $_SESSION["e_id"];
                            $result = mysqli_query($conn, "SELECT * FROM EMPLOYEE WHERE E_ID = $e_id");
                            
                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $efname = $row["First_Name"];
                                $elname = $row["Last_Name"];
                                $bdate = $row["Birth_Date"];
                                $eage = $row["Age"];
                                $esex = $row["Sex"];
                                $etype = $row["Type"];
                                $ejdate = $row["Join_Date"];
                                $esal = $row["Salary"];
                                $ephno = $row["Phone_Number"];
                                $email = $row["Email"];
                                $eadd = $row["Address"];
                            } else {
                                echo "<p>Error: Profile data not found.</p>";
                            }
                        } else {
                            header("Location: login.php");
                        }
                       
                            echo "<p><strong>First Name:</strong> $efname</p>";
                            echo "<p><strong>Last Name:</strong> $elname</p>";
                            echo "<p><strong>Birth Date:</strong> $bdate</p>";
                            echo "<p><strong>Age:</strong> $eage</p>";
                            echo "<p><strong>Sex:</strong> $esex</p>";
                            echo "<p><strong>Type:</strong> $etype</p>";
                            echo "<p><strong>Join Date:</strong> $ejdate</p>";
                            echo "<p><strong>Salary:</strong> $esal</p>";
                            echo "<p><strong>Phone Number:</strong> $ephno</p>";
                            echo "<p><strong>Email:</strong> $email</p>";
                            echo "<p><strong>Address:</strong> $eadd</p>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2023 Your Company Name. All rights reserved.</p>
</footer>
</body>
</html>
