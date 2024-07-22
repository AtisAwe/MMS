<?php
		include "config.php";
	
		if(isset($_GET['pid'])&&isset($_GET['sid'])&&isset($_GET['mid']))
		{
			$pid=$_GET['pid'];
			$sid=$_GET['sid'];
			$mid=$_GET['mid'];
			$qry1="SELECT * FROM purchase WHERE p_id='$pid' and sup_id='$sid' and med_id='$mid'";
			$result = $conn->query($qry1);
			$row = $result -> fetch_row();
		}
		
		 if( isset($_POST['update']))
		 {
			$pid=$_POST['pid'];
			$sid=$_POST['sid'];
			$mid=$_POST['mid'];
			$qty = $_POST['pqty'];
			$cost = $_POST['pcost'];
			$pdate = $_POST['pdate'];
			$mdate = $_POST['mdate'];
			$edate = $_POST['edate'];
			 
		$sql="UPDATE purchase SET p_cost='$cost',p_qty='$qty',pur_date='$pdate',mfg_date='$mdate',exp_date='$edate' 
				where p_id='$pid' and sup_id='$sid' and med_id='$mid'";
		if ($conn->query($sql))
		header("location:purchase-view.php");

		 }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Purchase</title>
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
    <link rel="stylesheet" type="text/css" href="table1.css">
    <link rel="stylesheet" type="text/css" href="form4.css">
</head>
<body>
    <?php 
			if( isset($_POST['update']))
		 {
			$pid=$_POST['pid'];
			$sid=$_POST['sid'];
			$mid=$_POST['mid'];
			$qty = $_POST['pqty'];
			$cost = $_POST['pcost'];
			$pdate = $_POST['pdate'];
			$mdate = $_POST['mdate'];
			$edate = $_POST['edate'];
			
			$sql="UPDATE purchase SET p_cost='$cost',p_qty='$qty',pur_date='$pdate',mfg_date='$mdate',exp_date='$edate' 
				where p_id='$pid' and sup_id='$sid' and med_id='$mid'";
			if (!($conn->query($sql)))
				echo "<p style='font-size:8; color:red;'>Error! Unable to update.</p>";
		 }
	?>
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
	<h2> UPDATE PURCHASE DETAILS</h2>
	</div>
	</center>
	<div class="purchase-add">
        <a href="purchase-add.php"><button>Add New Purchase</button></a><Br><br>
	    <a href="purchase-view.php"><button>Manage Purchase</button></a>
    </div>
	
	<div class="one">
		<div class="row">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
					<p>
						<label for="pid">Purchase ID:</label><br>
						<input type="number" name="pid" value="<?php echo $row[0]; ?>" readonly>
					</p>
					<p>
						<label for="sid">Supplier ID:</label><br>
						<input type="number" name="sid" value="<?php echo $row[1]; ?>" readonly>
					</p>
					<p>
						<label for="mid">Medicine ID:</label><br>
						<input type="number" name="mid" value="<?php echo $row[2]; ?>" readonly>
					</p>
					<p>
						<label for="pqty">Purchase Quantity:</label><br>
						<input type="number" name="pqty" value="<?php echo $row[3]; ?>">
					</p>
				</div>
				
				<div class="column">
					<p>
						<label for="pcost">Purchase Cost:</label><br>
						<input type="number" step="0.01" name="pcost" value="<?php echo $row[4]; ?>">
					</p>
					
					
					<p>
						<label for="pdate">Date of Purchase:</label><br>
						<input type="date" name="pdate" value="<?php echo $row[5]; ?>">
					</p>
					<p>
						<label for="mdate">Manufacturing Date:</label><br>
						<input type="date" name="mdate" value="<?php echo $row[6]; ?>">
					</p>
					<p>
						<label for="edate">Expiry Date:</label><br>
						<input type="date" name="edate" value="<?php echo $row[7]; ?>">
					</p>
				</div>
				</br></br>
			<input type="submit" name="update" value="Update">
			</form>	
		</div>
	</div>

</body>
</html>
