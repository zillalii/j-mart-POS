<?php

include('includes/db.php');

$full_name = $_POST['name'];
$user_email = $_POST['email'];
$user_name = $_POST['username'];
$user_password = $_POST['password'];
$user_role = $_POST['user_role'];

$check_query = "SELECT * FROM users WHERE u_email = '{$user_email}' LIMIT 1";
$check_result = mysqli_query($connection, $check_query) or die("Check Query Unsuccessful");

if (mysqli_num_rows($check_result) > 0) {
    echo "Email or username already exists";
}else {
    $sql = "INSERT INTO users(u_role,u_name,u_email,u_password) 
            VALUES ('{$user_role}','{$full_name}','{$user_email}','{$user_password}')";
    $result = mysqli_query($connection, $sql) or die("Query Unsuccessful");
    
    if ($result) {
        // echo "success"; 
         header("Location: user_view.php");
    } else {
        die("Something went wrong try again: " . mysqli_error($connection));
    }
}



?>