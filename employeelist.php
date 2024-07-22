
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" type="text/css" href="userface.css">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="form3.css">
    <link rel="stylesheet" type="text/css" href="table2.css">
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
        <div class="sidebar">
            <div class="bodyarea">
            <div class="head"><center>  
                        <h2>List of Employee</h2>
                    </div>
                <table id="table1">
                <tr>
			        <th>Employee ID</th>
			        <th>First Name</th>
			        <th>Last Name</th>
			        <th>Date of Birth</th>
			        <th>Age</th>
			        <th>Sex</th>
			        <th>Employee Type</th>
			        <th>Phone Number</th>
			        <th>Email Address</th>
			        <th>Home Address</th>
		        </tr>
                <?php
	            include "config.php";
	            $sql = "SELECT e_id, e_fname, e_lname, bdate, e_age, e_sex, e_type, e_phno, e_mail, e_add FROM employee where e_id<>1";
	            $result = $conn->query($sql);
	            if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	            echo "<tr>";
		            echo "<td>" . $row["e_id"]. "</td>";
		            echo "<td>" . $row["e_fname"] . "</td>";
		            echo "<td>" . $row["e_lname"] . "</td>";
		            echo "<td>" . $row["bdate"] . "</td>";
		            echo "<td>" . $row["e_age"]. "</td>";
		            echo "<td>" . $row["e_sex"]. "</td>";
		            echo "<td>" . $row["e_type"]. "</td>";
		            echo "<td>" . $row["e_phno"]. "</td>";
		            echo "<td>" . $row["e_mail"]. "</td>";
		            echo "<td>" . $row["e_add"]. "</td>";
                    echo "</td>";
	                echo "</tr>";
	                    }
	                 } else {
                        echo "<tr><td colspan='5'>No suppliers found.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table></center>
            </div>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2023 Farma Nura Ptv Ltd. All rights reserved.</p>
</footer>
</body>
</html>
