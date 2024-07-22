<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
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
    <h2> MEDICINE INVENTORY </h2>
    </div>
    </center>
    <div class="inventory-add">
        <a href="inventory-add.php"><button>Add New Medicine</button></a><Br><br>
	    <a href="inventory-view.php"><button>Manage Inventory</button></a>
    </div>
    
    <table align="right" id="table1" style="margin-right:100px;">
        <tr>
            <th>Medicine ID</th>
            <th>Medicine Name</th>
            <th>Quantity Available</th>
            <th>Category</th>
            <th>Price</th>
            <th>Location in Store</th>
            <th>Action: Edit</th>
            <th>Action: Delete</th>
        </tr>
  <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include "config.php";
        $sql = "SELECT med_id, med_name,med_qty,category,med_price,location_rack FROM meds";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        
            
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["med_id"]. "</td>";
            echo "<td>" . $row["med_name"] . "</td>";
            echo "<td>" . $row["med_qty"]. "</td>";
            echo "<td>" . $row["category"]. "</td>";
            echo "<td>" . $row["med_price"] . "</td>";
            echo "<td>" . $row["location_rack"]. "</td>";
            echo "<td align=center>";
            echo "<a class='button1 edit-btn' href=inventory-update.php?id=".$row['med_id'].">Edit</a>";
            echo "</td>";
            echo "<td align=center>";
            echo "<a class='button1 del-btn' href=inventory-delete.php?id=".$row['med_id'].">Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        } 

    $conn->close();
    ?>

</body>
</html>