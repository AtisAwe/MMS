<?php
require 'config.php';

if (isset($_GET['sale_id']) && is_numeric($_GET['sale_id'])) {
    $sale_id = $_GET['sale_id'];

    $sqlDeleteSale = "DELETE FROM sales WHERE SALE_ID = $sale_id";
    $sqlDeleteSalesItem = "DELETE FROM sales_items WHERE SALE_ID = $sale_id";

    if ($conn->query($sqlDeleteSale) === TRUE && $conn->query($sqlDeleteSalesItem) === TRUE) {

        header("Location: uipos2.php");
        exit();
    } else {
    
        echo "Error deleting sales record: " . $conn->error;
    }
} else {

    echo "Invalid SALE_ID.";
}

$conn->close();
?>
