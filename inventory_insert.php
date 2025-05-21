<?php
include 'includes/db.php';

$product_name=$_POST['product_name'];
$product_brand=$_POST['brand'];
$product_price=$_POST['selling_price'];
$product_supplier=$_POST['supplier'];
$product_description=$_POST['description'];

// Query Lagana.
$sql = "INSERT INTO products(p_name,p_brand,p_price,p_supplier,p_description)
        VALUES ('{$product_name}','{$product_brand}','{$product_price}','{$product_supplier}','{$product_description}')";
// Query Chalana.
$result = mysqli_query($connection,$sql )  or die("query failed");
if($result){
    header ('location: inventory_view.php');
}   
else{
    echo "failed...";
}






?>

