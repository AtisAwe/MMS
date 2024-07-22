<!DOCTYPE html>
<html>
<head>
    <title>Supplier</title>
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
    <link rel="stylesheet" type="text/css" href="table1.css">
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
	<h2> SUPPLIERS LIST</h2>
	</div>
	</center>
    </center>
    <div class="supplier-add">
        <a href="supplier-add.php"><button>Add New Supplier</button></a><Br><br>
	    <a href="supplier-view.php"><button>Manage Supplier</button></a>
    </div>
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Supplier ID</th>
			<th>Company Name</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th>Action: Edit</th>
            <th>Action: Delete</th>
		</tr>
		
	<?php
	
	include "config.php";
	$sql = "SELECT sup_id,sup_name,sup_add,sup_phno,sup_mail FROM suppliers";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
    echo "<tr>";
		echo "<td>" . $row["sup_id"]. "</td>";
		echo "<td>" . $row["sup_name"] . "</td>";
		echo "<td>" . $row["sup_add"]. "</td>";
		echo "<td>" . $row["sup_phno"]. "</td>";
		echo "<td>" . $row["sup_mail"]. "</td>";
		echo "<td align=center>";
		echo "<a class='button1 edit-btn' href=supplier-update.php?id=".$row['sup_id'].">Edit</a>";
		echo "</td>";
		echo "<td align=center>";
		echo "<a class='button1 del-btn' href=supplier-delete.php?id=".$row['sup_id'].">Delete</a>";
		echo "</td>";
	echo "</tr>";
	}
	echo "</table>";
	} 
    $conn->close();
	
	?>
</body>
</html>
