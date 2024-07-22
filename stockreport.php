<!DOCTYPE html>
<html>
<head>
    <title>Sales</title>
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
    <link rel="stylesheet" type="text/css" href="table1.css">
    <link rel="stylesheet" type="text/css" href="form3.css">
</head>
<body>
<header>        
    <a href="logout.php" class="logout-button">
        <span class="logout-icon">LOGOUT</span>
    </a>
    </header>
    <div class="sidebar">
        <h2>Welcome Admin</h2>
        <ul>
            <li><a href="adminpanel.php">Dashboard</a></li>
            <li><a href="supplier-view.php">Supplier List</a></li>
            <li><a href="purchase-view.php">Purchase List</a></li>
            <li><a href="inventory-view.php">Inventory List</a></li>
            <li><a href="customer-view.php">Customer List</a></li>
            <li><a href="employee-view.php">Employee List</a></li>
            <li><a href="sales-view.php">Sales List</a></li>
        </ul>
    </div>
    <center>
	<div class="head">
	<h2> MEDICINES LOW ON STOCK(LESS THAN 50)</h2>
	</div>
	</center>
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity Available</th>
			<th>Category</th>
			<th>Price</th>
		</tr>
		
	<?php
	
	include "config.php";
	$result=mysqli_query($conn,"CALL `STOCK`();");
	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

	echo "<tr>";
		echo "<td>" . $row["med_id"]. "</td>";
		echo "<td>" . $row["med_name"] . "</td>";
		echo "<td style='color:red;'>" . $row["med_qty"]. "</td>";
		echo "<td>" . $row["category"]. "</td>";
		echo "<td>" . $row["med_price"] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
	} 

	$conn->close();
	?>
</body>
</html>