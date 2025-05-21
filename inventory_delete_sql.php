<?php

$p_id = $_GET['id'];

include('includes/db.php');

$sql = "DELETE FROM products WHERE pid = {$p_id}";
$result = mysqli_query($connection, $sql) or die("Query Unsuccessful.");

if($result){
    // echo 'Deleted successfully';
    header('location:inventory_view.php');
    }else{
        echo 'unable to delete';
    }
?>
