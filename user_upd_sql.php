<?php

include('includes/db.php');

$u_id = $_POST['u_id'];
$full_name = $_POST['u_name'];
$email = $_POST['u_email'];


$sql = "UPDATE users SET u_name = '{$full_name}', u_email = '{$email}' WHERE u_id = {$u_id}";
$result = mysqli_query($connection, $sql) or die("Check Query Unsuccessful");

if ($result) {
    //echo "user update success";
    header("Location: user_view.php");

} else {
    die("Something went wrong try again: " . mysqli_error($connection));
}
 


//header("Location: http://localhost/shopmate_org_pagination/view_users.php");


?>