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
    <style>
        .add-button {
            background-color: #0747a8;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 10px 20px;
            margin: 20px; 
            font-size: 16px;
        }

        .add-button:hover {
            background-color: #1592d6;
        }

    </style>
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
                <div class="head">
                    <center>
                        <h2>List of Sales</h2>
                    </center>
                </div>
                <a href="uipos1.php" ><button class="add-button">Add Sales</button></a>
                <center><table id="table1">
                    <tr>
                        <th>Sale ID</th>
                        <th>Medicine ID</th>
                        <th>Medicine Name</th>
                        <th>Sale Quantity</th>
                        <th>Total Amount</th>
                        <th>Customer ID</th>
                        <th>Sale Date</th>
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
                            echo "<td>" . $row["SALE_ID"] . "</td>";
                            echo "<td>" . $row["MED_ID"] . "</td>";
                            echo "<td>" . $row["MED_NAME"] . "</td>";
                            echo "<td>" . $row["SALE_QTY"] . "</td>";
                            echo "<td>" . $row["TOT_PRICE"] . "</td>";
                            echo "<td>" . $row["C_ID"] . "</td>";
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
