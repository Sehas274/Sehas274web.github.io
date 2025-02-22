<?php  
session_start();  
include 'config.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $username = $_POST['username'];  
    $password = $_POST['password'];  

    // Demo: භාවිතා කරන්නේ සරල පරිශීලක නාමය/මුරපදය (Production එකේදී password_hash() භාවිතා කරන්න)  
    if ($username === "admin" && $password === "admin123") {  
        $_SESSION['loggedin'] = true;  
        header("Location: ../dashboard.php");  
    } else {  
        echo "Invalid credentials!";  
    }  
}  
?>  