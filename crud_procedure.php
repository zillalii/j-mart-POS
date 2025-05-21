<?php
// linking db.php external file below

include ("db.php");
// print_r($connection);
$added_on = date('Y-m-d H:i:s');


// Add record query.


// $sql = "INSERT INTO user_type(u_type, added_on) VALUES ('manager', '$added_on')";

// $query_result = mysqli_query($connection,$sql);
// if ($query_result){
//     echo "record added successfully";
// }else {
//     echo "Connection error";

// }

// update record :
$sql = "UPDATE user_type SET u_type='Shop Manager' WHERE id=2 ";
$check = mysqli_query($connection, $sql);
if ($check) {
    echo "Record Successfully updated";
} else {
    echo "cannot be updated sorry";
}

// This is read query code

$sql = "SELECT id,u_type FROM user_type where id=1";
$result = mysqli_query($con, $sql);
// print_r($result); exit();
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['u_type'] . "<br>";
}

// This is Delete query code

$sql = "DELETE FROM user_type WHERE id=1";
$chk = mysqli_query($con, $sql);
if ($chk) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>