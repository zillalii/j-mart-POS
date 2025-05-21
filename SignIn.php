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
      <form action="dashboard.php" method="POST">
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select name="role" id="role" class="form-select" required>
            <option value="">--select--</option>
            <option value="admin">Admin</option>
            <option value="client">Client</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required />
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
