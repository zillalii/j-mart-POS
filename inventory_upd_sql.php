<?php

include('includes/db.php');

$p_id = $_POST['pid'];
$p_name = $_POST['p_name'];
$p_price = $_POST['p_price'];
$p_description = $_POST['p_description'];


$sql = "UPDATE products SET p_name = '{$p_name}', p_price = '{$p_price}',p_description = '{$p_description}' WHERE pid = {$p_id}";
$result = mysqli_query($connection, $sql) or die("Check Query Unsuccessful");

if ($result) {
    // echo "success";
    header("Location: inventory_view.php");
} else {
    die("Something went wrong try again: " . mysqli_error($connection));
}
 


//header("Location: http://localhost/shopmate_org_pagination/view_users.php");


?>