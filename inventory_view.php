<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body.dark-mode {
      background-color: #121212 !important;
      color: #f1f1f1 !important;
    }
    .sidebar {
      min-height: 100vh;
      background-color: #f8f9fa;
    }
    .dark-mode .sidebar {
      background-color: #1f1f1f !important;
    }
    .dark-mode .sidebar .nav-link {
      color: #f1f1f1 !important;
    }
    .card {
      transition: background-color 0.3s;
    }
    .dark-mode .card {
      background-color: #2a2a2a;
      color: #f1f1f1;
    }
    .dark-mode .btn-outline-secondary {
      color: #f1f1f1;
      border-color: #f1f1f1;
    }
    .color-picker-container {
      display: none;
      position: absolute;
      top: 50px;
      right: 0;
      z-index: 1050;
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      padding: 10px;
      border-radius: 5px;
    }
    .color-picker-icon {
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
      <h2 class="mb-4 text-danger"><strong>J MART</strong></h2>
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link text-dark dark-mode-text" href="dashboard.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link text-dark dark-mode-text" href="#">Profile</a></li>
<li class="nav-item dropdown">
  <a 
    class="nav-link dropdown-toggle text-decoration-none text-dark dark-mode-text" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Inventory
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item text-dark" href="inventory_view.php">View Products</a></li>
    <li><a class="dropdown-item text-dark" href="inventory_add_item.php">Add Products</a></li>
    <li><a class="dropdown-item text-dark" href="inventory_upd.php">Update Products</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a 
    class="nav-link dropdown-toggle text-decoration-none text-dark dark-mode-text" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Manage Users
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item text-dark" href="user_view.php">View Users</a></li>
    <li><a class="dropdown-item text-dark" href="user_add.php">Add Users</a></li>
    <li><a class="dropdown-item text-dark" href="user_upd.php">Edit Users</a></li>
  </ul>
</li>
          
        </ul>
      </nav>

      <!-- Main -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
          <h1 class="h4">Welcome </h1>
          <div class="d-flex align-items-center gap-3">
            <!-- DARK MODE TOGGLE ICON -->
            <div>
              <i class="bi bi-moon-fill fs-5 cursor-pointer" id="darkModeToggle" role="button" title="Toggle Dark Mode"></i>
            </div>
            <!-- COLOR PICKER ICON -->
            <div>
              <i class="bi bi-palette fs-5 cursor-pointer" id="colorPickerToggle" role="button" title="Choose Background Color"></i>
            </div>            
        <span>jmart@live.com</span>
        <div class="dropdown"> 
          <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark"
             href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">  
            
            <img src="img/J-Mart.png" alt="Avatar" class="rounded-circle" width="45" height="45"/>
             <div class="d-flex flex-column lh-sm ms-3">
                <span id="userName" class="fw-bold text-danger ">Ali</span>
                <span id="userRole" class="d-block small text-danger ">admin</span>
            </div>
            </a>
                <ul class="dropdown-menu dropdown-menu-end bg-black golden-shadow border-0" aria-labelledby="accountDropdown">
                    
                    <li><a class="dropdown-item text-danger" href="SignIn.php">
                        <i class="fas fa-power-off me-2" ></i>Logout</a></li>
                </ul>
        </div>
        </div>

        <!-- Content -->
  <div class="card mt-4 p-4 ">
    <h1>View</h1>
     <?php 
    include('includes/db.php');

         $sql = "SELECT * FROM products";
         $result = mysqli_query($connection, $sql) or die("Query Unsuccessful");

         if(mysqli_num_rows($result) > 0 ) {
         ?>
         <div class="rounded">
        <table class="table table-bordered table-striped table-hover">
          <thead class="table-warning text-center">
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Brand</th>
              <th>Price</th>
              <th>Supplier</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr class="text-center">
              <td><?= $row['pid'] ?></td>
              <td><?php echo $row['p_name'] ?></td>
              <td><?php echo $row['p_brand'] ?></td>
              <td><?php echo $row['p_price'] ?></td>
              <td><?php echo $row['p_supplier'] ?></td>
              <td><?php echo $row['p_description'] ?></td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <a class="btn btn-danger btn-scale px-3" onclick="confirmItemDeletion(<?= $row['pid']; ?>)" >Delete</a>
                </div>
            </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
        <?php } else {
          echo "<div class=' p-4'><h2>No record found</h2></div>";
        }
    ?>
  </div>

      </main>
    </div>
  </div>

  <!-- Color Picker Container -->
  <div class="color-picker-container">
    <label for="colorPicker">Select Background Color: </label>
    <input type="color" id="colorPicker" value="#ffffff" />
  </div>

  <script>
    const toggleIcon = document.getElementById("darkModeToggle");
    const colorPickerToggle = document.getElementById("colorPickerToggle");
    const colorPickerContainer = document.querySelector(".color-picker-container");
    const colorPicker = document.getElementById("colorPicker");

    function toggleDarkMode() {
      document.body.classList.toggle("dark-mode");
  
      // Update icon
      if (document.body.classList.contains("dark-mode")) {
        toggleIcon.classList.remove("bi-moon-fill");
        toggleIcon.classList.add("bi-sun-fill");
        localStorage.setItem("theme", "dark");
      } else {
        toggleIcon.classList.remove("bi-sun-fill");
        toggleIcon.classList.add("bi-moon-fill");
        localStorage.setItem("theme", "light");
      }
    }
  
    // Add click event for dark mode toggle
    toggleIcon.addEventListener("click", toggleDarkMode);
  
    // On load, apply theme from localStorage
    window.onload = function () {
      if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        toggleIcon.classList.remove("bi-moon-fill");
        toggleIcon.classList.add("bi-sun-fill");
      }
      
      // Apply saved background color
      const savedColor = localStorage.getItem("backgroundColor");
      if (savedColor) {
        document.body.style.backgroundColor = savedColor;
        colorPicker.value = savedColor;
      }
    };

    // Color Picker functionality
    colorPickerToggle.addEventListener("click", function() {
      colorPickerContainer.style.display = colorPickerContainer.style.display === "none" ? "block" : "none";
    });

    // Change the background color based on the color picked
    colorPicker.addEventListener("input", function() {
      document.body.style.backgroundColor = colorPicker.value;
      localStorage.setItem("backgroundColor", colorPicker.value);
    });


      function confirmDeletion(user) {
        if (confirm('Are you sure you want to delete this user?')) {
            window.location.href = 'sql_delete_user.php?id=' + user;
        }
    }

    function confirmItemDeletion(product) {
        if (confirm('Are you sure you want to delete this item?')) {
            window.location.href = 'inventory_delete_sql.php?id=' + product;
        }
    }  
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
