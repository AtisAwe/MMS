<!DOCTYPE html>
<html>
<head>
    <title>Puschase</title>
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
	<h2> ADD PURCHASE DETAILS</h2>
	</div>
	</center>
    <div class="purchase-add">
        <a href="purchase-add.php"><button>Add New Purchase</button></a><Br><br>
	    <a href="purchase-view.php"><button>Manage Purchase</button></a>
    </div>
	
	
	<br><br><br>
	
	
	<div class="one row">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				
	<?php
	
		include "config.php";
		 
		if(isset($_POST['add']))
		{
		$pid = mysqli_real_escape_string($conn, $_REQUEST['pid']);
		$sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
		$mid = mysqli_real_escape_string($conn, $_REQUEST['mid']);
		$qty = mysqli_real_escape_string($conn, $_REQUEST['pqty']);
		$cost = mysqli_real_escape_string($conn, $_REQUEST['pcost']);
		$pdate = mysqli_real_escape_string($conn, $_REQUEST['pdate']);
		$mdate = mysqli_real_escape_string($conn, $_REQUEST['mdate']);
		$edate = mysqli_real_escape_string($conn, $_REQUEST['edate']);

		$sql = "INSERT INTO purchase VALUES ($pid, $sid, $mid,'$qty','$cost','$pdate','$mdate','$edate')";
		if(mysqli_query($conn, $sql)){
			echo "<p style='font-size:8;'>Purchase details successfully added!</p>";
		} else{
			echo "<p style='font-size:8;color:red;'>Error! Check details.</p>";
		}
		
		}
		 
		$conn->close();
	?>
	
			<div class="column">
					<p>
						<label for="pid">Purchase ID:</label><br>
						<input type="number" name="pid">
					</p>
					<p>
						<label for="sid">Supplier ID:</label><br>
						<input type="number" name="sid">
					</p>
					<p>
						<label for="mid">Medicine ID:</label><br>
						<input type="number" name="mid">
					</p>
					<p>
						<label for="pqty">Purchase Quantity:</label><br>
						<input type="number" name="pqty">
					</p>
					
					
				</div>
				<div class="column">
					
					<p>
						<label for="pcost">Purchase Cost:</label><br>
						<input type="number" step="0.01" name="pcost">
					</p>
					
					
					<p>
						<label for="pdate">Date of Purchase:</label><br>
						<input type="date" name="pdate">
					</p>
					<p>
						<label for="mdate">Manufacturing Date:</label><br>
						<input type="date" name="mdate">
					</p>
					<p>
						<label for="edate">Expiry Date:</label><br>
						<input type="date" name="edate">
					</p>
					
				</div>
				</br></br>
			
			<input type="submit" name="add" value="Add Purchase">
			</form>
		<br>
	
	</div>
</body>
</html>
