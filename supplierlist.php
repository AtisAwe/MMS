
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" type="text/css" href="userface.css">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="form3.css">
    <link rel="stylesheet" type="text/css" href="table2.css">
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
            </ul>
        </div>
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
    <section>
        <div class="sidebar">
            <div class="bodyarea">
            <div class="head"><center>  
                        <h2>List of Supplier</h2>
                    </div>
                <table id="table1">
                    <tr>
                        <th>Supplier ID</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                    </tr>
                    <?php
                    include "config.php";
                    $sql = "SELECT sup_id, sup_name, sup_add, sup_phno, sup_mail FROM suppliers";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["sup_id"] . "</td>";
                            echo "<td>" . $row["sup_name"] . "</td>";
                            echo "<td>" . $row["sup_add"] . "</td>";
                            echo "<td>" . $row["sup_phno"] . "</td>";
                            echo "<td>" . $row["sup_mail"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No suppliers found.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table></center>
            </div>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2023 Farma Nura Ptv Ltd. All rights reserved.</p>
</footer>
</body>
</html>
