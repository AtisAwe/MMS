<?php
	include "config.php";
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$qry1="SELECT * FROM meds WHERE med_id='$id'";
		$result = $conn->query($qry1);
		$row = $result -> fetch_row();
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
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
	<h2> UPDATE MEDICINE DETAILS</h2>
	</div>
	</center>
    <div class="inventory-add">
        <a href="inventory-add.php"><button>Add New Medicine</button></a><Br><br>
	    <a href="inventory-view.php"><button>Manage Inventory</button></a>
    </div>
	<div class="one">
		<div class="row">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
				<p>
					<label for="medid">Medicine ID:</label><br>
					<input type="number" name="medid" value="<?php echo $row[0]; ?>" readonly>
				</p>
				<p>
					<label for="medname">Medicine Name:</label><br>
					<input type="text" name="medname" value="<?php echo $row[1]; ?>">
				</p>
				<p>
					<label for="qty">Quantity:</label><br>
					<input type="number" name="qty" value="<?php echo $row[2]; ?>">
				</p>
				<p>
					<label for="cat">Category:</label><br>
					<input type="text" name="cat" value="<?php echo $row[3]; ?>">
				</p>
				</div>
				
				<div class="column">
				<p>
					<label for="sp">Price: </label><br>
					<input type="number" step="0.01" name="sp" value="<?php echo $row[4]; ?>">
				</p>
				<p>
					<label for="loc">Location:</label><br>
					<input type="text" name="loc" value="<?php echo $row[5]; ?>">
				</p>
				</div>
				</br></br>
				<input type="submit" name="update" value="Update">
				</form>
				
	<?php

		if( isset($_POST['medname'])||isset($_POST['qty'])||isset($_POST['cat'])||isset($_POST['sp'])||isset($_POST['loc'])) {
			 $id=$_POST['medid'];
			 $name=$_POST['medname'];
			 $qty=$_POST['qty'];
			 $cat=$_POST['cat'];
			 $price=$_POST['sp'];
			 $lcn=$_POST['loc'];
			 
		$sql="UPDATE meds SET med_name='$name',med_qty='$qty',category='$cat',med_price='$price',location_rack='$lcn' where med_id='$id'";
		if ($conn->query($sql))
		header("location:inventory-view.php");
		else
		echo "<p style='font-size:8;color:red;'>Error! Unable to update.</p>";
		}

	?>
		</div>
	</div>
</body>
</html>
