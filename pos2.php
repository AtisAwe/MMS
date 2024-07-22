<!DOCTYPE html>
<html>
<head>
    <title>Employee</title>
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
    <h2> LIST OF SALES</h2>
    </div>
    </center>
    <div class="sales-add">
        <a href="pos1.php"><button>Add New Sales</button></a><Br><br>
    </div>
    <table align='right' id='table1'>
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total Price</th>
			<th>Action</th>
		</tr>
                <?php
                    require 'config.php';
                    $sql = "SELECT sales.SALE_ID, sales_items.MED_ID, meds.MED_NAME, sales_items.SALE_QTY, sales_items.TOT_PRICE, sales.C_ID, sales.S_DATE FROM sales
                    INNER JOIN sales_items ON sales.SALE_ID = sales_items.SALE_ID
                    INNER JOIN meds ON sales_items.MED_ID = meds.MED_ID";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["MED_ID"] . "</td>";
                            echo "<td>" . $row["MED_NAME"] . "</td>";
                            echo "<td>" . $row["SALE_QTY"] . "</td>";
                            echo "<td>" . $row["TOT_PRICE"] . "</td>";
                            echo "<td>" . $row["S_DATE"] . "</td>";
                            echo "<td align=center>";
					        echo "<a name='delete' class='button1 del-btn' href=uipos-delete.php?sale_id=".$row["SALE_ID"].">Delete</a>";
					        echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No sales records found</td></tr>";
                    }

                    $conn->close();
                ?>
            </table>
</body>
<html>