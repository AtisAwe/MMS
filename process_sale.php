<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sale_id = $_POST['sale_id'];
    $total_amt = $_POST['total_amt'];
    $c_id = $_POST['c_id'];
    $s_date = $_POST['s_date'];
    $s_time = $_POST['s_time'];
    $e_id = $_POST['e_id'];
    $sale_qty = $_POST['sale_qty'];
    $med_id = $_POST['med_id'];

    $sql = "INSERT INTO sales (SALE_ID, C_ID, S_DATE, S_TIME, TOTAL_AMT, E_ID)
    VALUES ('$sale_id', '$c_id', '$s_date', '$s_time', '$total_amt', '$e_id')";

    $sqlSalesItem = "INSERT INTO sales_item (SALE_ID, MED_ID, SALE_QTY, TOT_PRICE)
                         VALUES ('$sale_id', '$med_id', '$sale_qty', '$total_amt')";


    $conn->close();
}
?>
