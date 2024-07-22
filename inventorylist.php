
<?php

	include "config.php";
	
	if(isset($_POST['search'])) {
		
		$search=$_POST['valuetosearch'];
		$search_result=mysqli_query($conn,"SET @p0='$search';")or die(mysqli_error($conn));
		$search_result=mysqli_query($conn,"CALL `SEARCH_INVENTORY`(@p0);") or die(mysqli_error($conn));
	}
	else {
			$query="SELECT med_id as medid, med_name as medname,med_qty as medqty,category as medcategory,med_price as medprice,location_rack as medlocation FROM meds";
			$search_result=filtertable($query);
	}
	
	function filtertable($query)
	{	$conn = mysqli_connect("localhost", "root", "", "reg");
		$filter_result=mysqli_query($conn,$query);
		return $filter_result;
	}
	
?>
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
                <div class="description">
                    <div class="head">
                    <center><h2>MEDICINE INVENTORY</h2></center>
                    </div>
                    <center>
                    <form method="post">
                        <input type="text" name="valuetosearch" placeholder="Enter any value to Search" style="width:400px; margin-left:250px;">
                        <input type="submit" name="search" value="Search">
                        <br><br>
                    </form>
                    </center>
                    <center>
                    <table id="table1">
                        <tr>
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
                            <th>Quantity Available</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Location in Store</th>
                        </tr>

                        <?php
                        if ($search_result->num_rows > 0) {
                            while ($row = $search_result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["medid"] . "</td>";
                                echo "<td>" . $row["medname"] . "</td>";
                                echo "<td>" . $row["medqty"] . "</td>";
                                echo "<td>" . $row["medcategory"] . "</td>";
                                echo "<td>" . $row["medprice"] . "</td>";
                                echo "<td>" . $row["medlocation"] . "</td>";
                                echo "</tr>";
                            }
                        }
                        $conn->close();
                        ?>
                    </table></center>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2023 Farma Nura Ptv Ltd. All rights reserved.</p>
</footer>
</body>
</html>
