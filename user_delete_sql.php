<?php

$user_id = $_GET['id'];

include('includes/db.php');

$sql = "DELETE FROM users WHERE u_id = {$user_id}";
$result = mysqli_query($connection, $sql) or die("Query Unsuccessful.");

// echo "User Deleted";

header("Location: user_view.php");

?>
