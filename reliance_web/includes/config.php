<?php  
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "reliance_products";  

// දත්ත සමුදාවට සම්බන්ධ වීම  
$conn = new mysqli($servername, $username, $password, $dbname);  

if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  
?>  