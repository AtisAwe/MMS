<!DOCTYPE html>
<html>
<head>
    <title>Customer</title>
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
	<h2> ADD CUSTOMER DETAILS</h2>
	</div>
	</center>
    <div class="customer-add">
        <a href="customer-add.php"><button>Add New Customer</button></a><Br><br>
	    <a href="customer-view.php"><button>Manage Customer</button></a>
    </div>
	<br><br>
	<div class="one">
		<div class="row">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
					<p>
						<label for="cid">Customer ID:</label><br>
						<input type="number" name="cid">
					</p>
					<p>
						<label for="cfname">First Name:</label><br>
						<input type="text" name="cfname">
					</p>
					<p>
						<label for="clname">Last Name:</label><br>
						<input type="text" name="clname">
					</p>
					<p>
						<label for="age">Age:</label><br>
						<input type="number" name="age">
					</p>
					
					<p>
						<label for="sex">Sex: </label><br>
						<select id="sex" name="sex">
								<option value="selected">Select</option>
								<option>Female</option>
								<option>Male</option>
								<option>Others</option>
						</select>
					</p>
					
				</div>
				<div class="column">
					
					<p>
						<label for="phno">Phone Number: </label><br>
						<input type="number" name="phno">
					</p>
					<p>
						<label for="emid">Email ID:</label><br>
						<input type="text" name="emid">
					</p>
				</div></br></br>
			<input type="submit" name="add" value="Add Customer">
			</form>
		<br>
		
		
			<?php
			include "config.php";
			 
			if(isset($_POST['add']))
			{
			$id = mysqli_real_escape_string($conn, $_REQUEST['cid']);
			$fname = mysqli_real_escape_string($conn, $_REQUEST['cfname']);
			$lname = mysqli_real_escape_string($conn, $_REQUEST['clname']);
			$age = mysqli_real_escape_string($conn, $_REQUEST['age']);
			$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
			$phno = mysqli_real_escape_string($conn, $_REQUEST['phno']);
			$mail = mysqli_real_escape_string($conn, $_REQUEST['emid']);

			 
			$sql = "INSERT INTO customer VALUES ($id, '$fname', '$lname',$age,'$sex',$phno, '$mail')";
			if(mysqli_query($conn, $sql)){
				echo "<p style='font-size:8;'>Customer successfully added!</p>";
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
