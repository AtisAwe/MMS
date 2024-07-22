
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale</title>
    <link rel="stylesheet" type="text/css" href="userface.css">
    <link rel="stylesheet" type="text/css" href="pos2.css">
    <link rel="stylesheet" type="text/css" href="form3.css">
    <link rel="stylesheet" type="text/css" href="table2.css">
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #158bc2; 
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 20px; 
        }

        .button:hover {
            background-color: #1596db; 
        }
        label {
            font-weight: bold;
        }

        select, input, button {
            width: 40%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #0b5eeda9;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #1596db;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            }

            form label {
                font-weight: bold;
                text-align: left;
                width: 50%; 
                margin-bottom: 5px;
            }

            form select, form input {
                width: 50%; 
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            form button {
                background-color: #0b5eeda9;
                color: #fff;
                border: none;
                cursor: pointer;
                width: 50%; 
            }

            form button:hover {
                background-color: #1596db;
                margin-top: 10px;
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
                        <center><h2>POINT OF SALE</h2></center>
                    </div></br></br>
                    <a href="uipos2.php" class="button">Go to Sales List</a></br></br>
                    <center><form action="<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm()">
                        <label for="med_id">Medicine:</label>
                        <select name="med_id" id="med_id">
                            <option value="" disabled selected>Select a Medicine</option>
                            <?php
                            require 'temp.php';
                            $sql = "SELECT MED_ID, MED_NAME FROM meds";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["MED_ID"] . "'>" . $row["MED_NAME"] . "</option>";
                                }
                            }

                            $conn->close();
                            ?>
                        </select></br>

                        <label for="sale_id">Sale ID:</label>
                        <input type="text" name="sale_id" id="sale_id" required> </br>

                        <label for="sale_qty">Sales Quantity:</label> 
                        <input type="text" name="sale_qty" id="sale_qty" required></br>

                        <label for="c_id">Customer:</label>
                        <select name="c_id" id="c_id">
                            <option value="" disabled selected>Select a Customer</option>
                            <?php
                            require 'temp.php';

                            $sql = "SELECT c_id, CONCAT(c_id, ' - ', C_FNAME, ' ', C_LNAME) AS customer_name FROM customer";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["c_id"] . "'>" . $row["customer_name"] . "</option>";
                                }
                            }

                            $conn->close();
                            ?>
                        </select></br>

                        <label for="e_id">Employee:</label>
                        <select name="e_id" id="e_id">
                            <option value="" disabled selected>Select an Employee</option>
                            <?php
                            require 'temp.php';
                            $sql = "SELECT E_ID, CONCAT(E_ID, ' - ', E_FNAME, ' ', E_LNAME) AS employee_name FROM employee";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["E_ID"] . "'>" . $row["employee_name"] . "</option>";
                                }
                            }

                            $conn->close();
                            ?>
                        </select></br>

                        <label for="s_date">Sale Date:</label>
                        <input type="date" name="s_date" id="s_date" required></br>

                        <label for="s_time">Sale Time:</label>
                        <input type="time" name="s_time" id="s_time" required></br>

                        <button type="submit" name="submit">Add Sale</button>
                    </form></center>

                    <?php
                    include "temp.php";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $sale_id = mysqli_real_escape_string($conn, $_POST['sale_id']);
                        $c_id = mysqli_real_escape_string($conn, $_POST['c_id']);
                        $s_date = mysqli_real_escape_string($conn, $_POST['s_date']);
                        $s_time = mysqli_real_escape_string($conn, $_POST['s_time']);
                        $e_id = mysqli_real_escape_string($conn, $_POST['e_id']);
                        $sale_qty = mysqli_real_escape_string($conn, $_POST['sale_qty']);
                        $med_id = mysqli_real_escape_string($conn, $_POST['med_id']);
                    
                        $sqlCheckSaleID = "SELECT SALE_ID FROM sales WHERE SALE_ID = '$sale_id'";
                        $resultCheckSaleID = $conn->query($sqlCheckSaleID);
                    
                        if ($resultCheckSaleID->num_rows > 0) {
                            echo "Sale ID '$sale_id' is already taken. Please choose a different one.";
                        } else {
                            $sqlGetMedPrice = "SELECT med_price FROM meds WHERE MED_ID = '$med_id'";
                            $resultMedPrice = $conn->query($sqlGetMedPrice);
                    
                            if ($resultMedPrice->num_rows == 1) {
                                $rowMedPrice = $resultMedPrice->fetch_assoc();
                                $med_price = $rowMedPrice['med_price'];
                                $med_price += ($med_price * 0.05);
                                $total_amt = $med_price * $sale_qty;
                    
                                $sqlInsertSale = "INSERT INTO sales (SALE_ID, C_ID, S_DATE, S_TIME, TOTAL_AMT, E_ID)
                                                VALUES ('$sale_id', '$c_id', '$s_date', '$s_time', '$total_amt', '$e_id')";
                    
                                if ($conn->query($sqlInsertSale) === TRUE) {
                                    $lastInsertId = $conn->insert_id;
                    
                                    $sqlInsertSalesItem = "INSERT INTO sales_items (SALE_ID, MED_ID, SALE_QTY, TOT_PRICE)
                                                    VALUES ('$lastInsertId', '$med_id', '$sale_qty', '$total_amt')";
                    
                                    if ($conn->query($sqlInsertSalesItem) === TRUE) {
                                        echo "Sale record and related sales item inserted successfully!";
                                    } else {
                                        echo "Error inserting sales item: " . $conn->error;
                                    }
                                } else {
                                    echo "Error inserting sale record: " . $conn->error;
                                }
                            } else {
                                echo "Medicine with MED_ID '$med_id' not found.";
                            }
                        }
                    
                        $conn->close();
                    }
                    ?>                    

                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Farma Nura Ptv Ltd. All rights reserved.</p>
    </footer>
    <script>
     function getCurrentTime() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    return `${hours}:${minutes}`;
    }
    document.getElementById('s_time').value = getCurrentTime();
    </script>
</body>
</html>
