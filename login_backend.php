<?php
session_start();    
include('includes/db.php');

$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$user_role = mysqli_real_escape_string($connection, $_POST['role']);

if (empty($email) || empty($password) || empty($user_role)) {
    $msg="All fields are required";
    $_SESSION['my_msg'] = $msg;
    header("Location: SignIn.php");
    exit();
}


$sql = "SELECT * FROM users JOIN user_type ON users.u_role = user_type.ut_id 
        WHERE users.u_email = '{$email}' AND users.u_password = '{$password}' AND users.u_role = '{$user_role}' 
        LIMIT 1";
$result = mysqli_query($connection, $sql) or die("Query failed");



if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['u_id'] = $row['u_id'];
    $_SESSION['u_email'] = $row['u_email'];
    $_SESSION['user_role'] = $row['u_role'];
    $_SESSION['full_name'] = $row['u_name'];
    $_SESSION['u_type'] = $row['u_type'];
    $_SESSION['my_msg'] = '';
     $msg="You are logged In";
    header("Location: dashboard.php");
    exit();
} else {
    $msg="Invalid email, password, or role";
    $_SESSION['my_msg'] = $msg;
    header("Location: SignIn.php");
    exit();
}
?>
