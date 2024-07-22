<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" type="text/css" href="userface.css">   
</head>
<body>
<div class="header">
        <h1>Medicine Management System</h1>   
    </div>
    <header>
        <nav>
            <div class="left-nav">
            <ul>
                <li><a href="supplierlist.php" name="supplierlist">Supplier List</a></li>
                <li><a href="inventorylist.php" name="inventorylist">Inventory List</a></li>
                <li><a href="uipos2.php" name="saleslist">Sales List</a></li>
            </ul></div>
            <ul>
                <li><a href="userinterface.php" name="home">Home</a></li>
                <li><a href="aboutus.php" name="about">About</a></li>
                <li><a href="contact.php" name="contact">Contact</a></li>
                <li><a href="profile.php" name="profile">Profile</a></li>
                <li><a href="logout.php" name="logout">Logout</a></li>
            </ul>
        </nav>
        
    </header>
    <main>
        <?php
        include "config.php";
         if(isset($_SESSION['user'])){
        $ename = $_SESSION['user'];
        }
        ?>
        <section>
        <div class="sidebar">
            <div class="bodyarea">
                <div class="description"><center>   
                    <h2>Welcome <?php echo $ename; ?></h2></center>
                    <div class="row">
            <div class="column">
                <a href="uipos1.php" title="Add New Sale" class="dashboard-item">
                    <img src="img/carticon1.png" alt="Add New Sale">
                    <span class="dashboard-label">Add New Sale</span>
                </a>
            </div>
            <div class="column">
                <a href="inventorylist.php" title="View Inventory" class="dashboard-item">
                    <img src="img/inventory.png" alt="View Inventory">
                    <span class="dashboard-label">View Inventory</span>
                </a>
            </div>
            <div class="column">
                <a href="supplierlist.php" title="View Supplier" class="dashboard-item">
                    <img src="img/supplier.png" alt="View Supplier">
                    <span class="dashboard-label">View Supplier</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <a href="employeelist.php" title="View Employee" class="dashboard-item">
                    <img src="img/emp.png" alt="View Employee">
                    <span class="dashboard-label">View Employee</span>
                </a>
            </div>
            <div class="column">
                <a href="customerlist.php" title="Customer List" class="dashboard-item">
                    <img src="img/c_list.png" alt="Customer List">
                    <span class="dashboard-label">Customer List</span>
                </a>
            </div>
            <div class="column">
                <a href="adminlogin.php" title="Go To Admin Login" class="dashboard-item">
                    <img src="img/admin.png" alt="Go To Admin Login">
                    <span class="dashboard-label">Go To Admin Login</span>
                </a>
            </div>
        </div>


        </div>
        </div>
        </div>            
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Farma Nura Ptv Ltd. All rights reserved.</p>
    </footer>
</body>
</html>
