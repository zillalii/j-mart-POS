<?php
session_start();
if(isset($_GET['action'])){
  session_unset();
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="CSS/style.css"> -->
</head>
<body style="background: url('img/supermarket.jpg');background-repeat: no-repeat;overflow: hidden;backdrop-filter: blur(3px);background-size: cover">

  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow w-100" style="max-width: 400px;">
      <h2 class="text-center mb-4">Sign In</h2>
      <form id="signInForm"  action="login_backend.php" method="POST">
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select name="role" id="role" class="form-select" required>
            <option value="" disabled selected>--select--</option>
            <?php

                include('includes/db.php');

                $sql = "SELECT * FROM user_type";
                $result = mysqli_query($connection, $sql) or die("Query failed");
                
                if(mysqli_num_rows($result) > 0) {
                  while($rows = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$rows['ut_id']}'>{$rows['u_type']}</option>";        
                  }
                }
            ?>
              </select>
          </select>
        </div>
      
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Sign In</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS (optional, for interactivity like dropdowns) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
