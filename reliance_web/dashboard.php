<?php session_start(); ?>  
<!DOCTYPE html>  
<html>  
<head>  
    <title>Dashboard - Reliance Products</title>  
    <link rel="stylesheet" href="style.css">  
</head>  
<body>  
    <nav>  
        <a href="dashboard.php">Home</a>  
        <a href="add_sale.php">Add Sale</a>  
        <a href="includes/logout.php">Logout</a>  
    </nav>  
    <div class="container">  
        <h1>Sales Report</h1>  
        <table>  
            <tr>  
                <th>Sale ID</th>  
                <th>Customer</th>  
                <th>Total</th>  
            </tr>  
            <?php  
            include 'includes/config.php';  
            $sql = "SELECT Sales.SaleID, Customers.Name, SUM(Products.Price * SalesDetails.Quantity) AS Total  
                    FROM Sales  
                    JOIN Customers ON Sales.CustomerID = Customers.CustomerID  
                    JOIN SalesDetails ON Sales.SaleID = SalesDetails.SaleID  
                    JOIN Products ON SalesDetails.ProductID = Products.ProductID  
                    GROUP BY Sales.SaleID";  
            $result = $conn->query($sql);  
            while ($row = $result->fetch_assoc()) {  
                echo "<tr>  
                        <td>{$row['SaleID']}</td>  
                        <td>{$row['Name']}</td>  
                        <td>$ {$row['Total']}</td>  
                      </tr>";  
            }  
            ?>  
        </table>  
    </div>  
</body>  
</html>  