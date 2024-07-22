<!DOCTYPE html>
<html>
<head>
    <title>Purchase</title>
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
    <link rel="stylesheet" type="text/css" href="table1.css">
    <link rel="stylesheet" type="text/css" href="form4.css">
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
	<h2> STOCK PURCHASE LIST</h2>
	</div>
	</center>
	<div class="purchase-add">
        <a href="purchase-add.php"><button>Add New Purchase</button></a><Br><br>
	    <a href="purchase-view.php"><button>Manage Purchase</button></a>
    </div>
	<table align="left" id="table1" style="margin-left:250px;">
		<tr>
			<th>Purchase ID</th>
			<th>Supplier ID</th>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Cost of Purchase</th>
			<th>Date of Purchase</th>
			<th>Manufacturing Date</th>
			<th>Expiry Date</th>
			<th>Action: Edit</th>
            <th>Action: Delete</th>
		</tr>
		
	<?php

	include "config.php";
	$sql = "SELECT p_id,sup_id,med_id,p_qty,p_cost,pur_date,mfg_date,exp_date FROM purchase";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {
		
		$sql1="SELECT med_name from meds where med_id=".$row["med_id"]."";
		$result1 = $conn->query($sql1);
		
		while($row1 = $result1->fetch_assoc()) {

			echo "<tr>";
				echo "<td>" . $row["p_id"]. "</td>";
				echo "<td>" . $row["sup_id"]. "</td>";
				echo "<td>" . $row["med_id"]. "</td>";
				echo "<td>" . $row1["med_name"] . "</td>";
				echo "<td>" . $row["p_qty"]. "</td>";
				echo "<td>" . $row["p_cost"]. "</td>";
				echo "<td>" . $row["pur_date"]. "</td>";
				echo "<td>" . $row["mfg_date"] . "</td>";
				echo "<td>" . $row["exp_date"]. "</td>";
				echo "<td align=center>";		 
				echo "<a class='button1 edit-btn' href=purchase-update.php?pid=".$row['p_id']."&sid=".$row['sup_id']."&mid=".$row['med_id'].">Edit</a>";
				echo "</td>";
				echo "<td align=center>";
				echo "<a class='button1 del-btn' href=purchase-delete.php?pid=".$row['p_id']."&sid=".$row['sup_id']."&mid=".$row['med_id'].">Delete</a>";
				echo "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
} 
	$conn->close();
	
	?>
</body>
</html>
