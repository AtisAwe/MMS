<?php
		include "config.php";
	
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$qry1="SELECT * FROM suppliers WHERE sup_id='$id'";
			$result = $conn->query($qry1);
			$row = $result -> fetch_row();
		}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Supplier</title>
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
	<h2> UPDATE SUPPLIER DETAILS</h2>
	</div>
	</center>
    <div class="supplier-add">
        <a href="supplier-add.php"><button>Add New Supplier</button></a><Br><br>
	    <a href="supplier-view.php"><button>Manage Supplier</button></a>
    </div>
	<div class="one">
		<div class="row">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
					<p>
						<label for="sid">Supplier ID:</label><br>
						<input type="number" name="sid" value="<?php echo $row[0]; ?>" readonly>
					</p>
					<p>
						<label for="sname">Supplier Company Name:</label><br>
						<input type="text" name="sname" value="<?php echo $row[1]; ?>">
					</p>
					<p>
						<label for="sadd">Address:</label><br>
						<input type="text" name="sadd" value="<?php echo $row[2]; ?>">
					</p>
					
					
				</div>
				<div class="column">
					<p>
						<label for="sphno">Phone Number:</label><br>
						<input type="number" name="sphno" value="<?php echo $row[3]; ?>">
					</p>
					
					<p>
						<label for="smail">Email Address </label><br>
						<input type="text" name="smail" value="<?php echo $row[4]; ?>">
					</p>
					
				</div>
				
				</br></br>
			<input type="submit" name="update" value="Update">
			</form>
			
	<?php
		 if( isset($_POST['update']))
		 {
			$id = $_POST['sid'];
			$name = $_POST['sname'];
			$add = $_POST['sadd'];
			$phno = $_POST['sphno'];
			$mail = $_POST['smail'];
			 
		$sql="UPDATE suppliers SET sup_name='$name',sup_add='$add',sup_phno='$phno',sup_mail='$mail' where sup_id='$id'";
		if ($conn->query($sql))
		header("location:supplier-view.php");
		else
		echo "<p style='font-size:8; color:red;'>Error! Unable to update.</p>";
		}

	?>
		</div>
	</div>

</body>
</html>
