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
    <h2> MEDICINE INVENTORY </h2>
    </div>
    </center>
    <div class="inventory-add">
        <a href="inventory-add.php"><button>Add New Medicine</button></a><Br><br>
	    <a href="inventory-view.php"><button>Manage Inventory</button></a>
    </div>
    <center>
	<div class="head">
	<h2> ADD MEDICINE DETAILS</h2>
	</div>
	</center>
	
	
	<br><br><br>
	
	
	<div class="one">
		<div class="row">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
					<p>
						<label for="medid">Medicine ID:</label><br>
						<input type="number" name="medid">
					</p>
					<p>
						<label for="medname">Medicine Name:</label><br>
						<input type="text" name="medname">
					</p>
					<p>
						<label for="qty">Quantity:</label><br>
						<input type="number" name="qty">
					</p>
					<p>
						<label for="cat">Category:</label><br>
						<select id="cat" name="cat">
								<option>Tablet</option>
								<option>Capsule</option>
								<option>Syrup</option>
								<option>Injection</option>
								<option>Pharmacutical Product</option>
						</select>
					</p>
					
				</div>
				<div class="column">
					
					<p>
						<label for="sp">Price: </label><br>
						<input type="number" step="0.01" name="sp">
					</p>
					<p>
						<label for="loc">Location:</label><br>
						<input type="text" name="loc">
					</p>
				</div>
				
				</br></br>
			<input type="submit" name="add" value="Add Medicine">
			</form>
		<br>
		
		
	<?php
	
		include "config.php";
		 
		if(isset($_POST['add']))
		{
		$id = mysqli_real_escape_string($conn, $_REQUEST['medid']);
		$name = mysqli_real_escape_string($conn, $_REQUEST['medname']);
		$qty = mysqli_real_escape_string($conn, $_REQUEST['qty']);
		$category = mysqli_real_escape_string($conn, $_REQUEST['cat']);
		$sprice = mysqli_real_escape_string($conn, $_REQUEST['sp']);
		$location = mysqli_real_escape_string($conn, $_REQUEST['loc']);

		 
		$sql = "INSERT INTO meds VALUES ($id, '$name', $qty,'$category',$sprice, '$location')";
		if(mysqli_query($conn, $sql)){
            header("location: inventory-view.php");
			echo "<p style='font-size:8;'>Medicine details successfully added!</p>";
		} else{
			echo "<p style='font-size:8; color:red;'>Error! Check details.</p>";
		}
		}
		 
		$conn->close();
	?>
		</div>
	</div>
	</body>
	</html>