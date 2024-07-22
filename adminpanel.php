<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="adminpanel.css">
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
    <h2> ADMIN DASHBOARD </h2>
    </div style="margin:20px; padding:10px;">
    </center>
    <br><br>
    <div class="row">
            <div class="column">
                <a href="pos1.php" title="Add New Sale" class="dashboard-item">
                    <img src="img/carticon1.png" alt="Add New Sale">
                    <span class="dashboard-label">Add New Sale</span>
                </a>
            </div>
            <div class="column">
                <a href="inventory-view.php" title="View Inventory" class="dashboard-item">
                    <img src="img/inventory.png" alt="View Inventory">
                    <span class="dashboard-label">View Inventory</span>
                </a>
            </div>
            <div class="column">
                <a href="employee-view.php" title="View Employees" class="dashboard-item">
                    <img src="img/emp.png" alt="View Employees">
                    <span class="dashboard-label">View Employees</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <a href="salesreport.php" title="View Transactions" class="dashboard-item">
                    <img src="img/moneyicon.png" alt="View Transactions">
                    <span class="dashboard-label">View Transactions</span>
                </a>
            </div>
            <div class="column">
                <a href="stockreport.php" title="Stock Report" class="dashboard-item">
                    <img src="img/alert.png" alt="Stock Report">
                    <span class="dashboard-label">Stock Report</span>
                </a>
            </div>
            <div class="column">
                <a href="expiryreport.php" title="Expiry Report" class="dashboard-item">
                    <img src="img/expired.png" alt="Expiry Report">
                    <span class="dashboard-label">Expiry Report</span>
                </a>
            </div>
        </div>
</div>
</body>
</html>