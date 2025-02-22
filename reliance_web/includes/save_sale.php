<?php  
session_start();  
include 'config.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $customerID = $_POST['customer_id'];  
    $productID = $_POST['product_id'];  
    $quantity = $_POST['quantity'];  

    // Sales වගුවට දත්ත ඇතුළත් කිරීම  
    $stmt = $conn->prepare("INSERT INTO Sales (CustomerID) VALUES (?)");  
    $stmt->bind_param("i", $customerID);  
    $stmt->execute();  
    $saleID = $stmt->insert_id;  

    // SalesDetails වගුවට දත්ත ඇතුළත් කිරීම  
    $stmt = $conn->prepare("INSERT INTO SalesDetails (SaleID, ProductID, Quantity) VALUES (?, ?, ?)");  
    $stmt->bind_param("iii", $saleID, $productID, $quantity);  
    $stmt->execute();  

    header("Location: ../dashboard.php");  
}  
?>  