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
                  <!-- DARK MODE TOGGLE ICON -->
            <div>
              <i class="bi bi-moon-fill fs-5 cursor-pointer" id="darkModeToggle" role="button" title="Toggle Dark Mode"></i>
            </div>
            <!-- COLOR PICKER ICON -->
            <div>
              <i class="bi bi-palette fs-5 cursor-pointer" id="colorPickerToggle" role="button" title="Choose Background Color"></i>
            </div>
          </div>
        </div>

        <!-- Content -->
  <div class="card mt-4 p-4 ">
    <form action="inventory_insert.php" method="POST">
      <div class="mb-4">
        <h2>Add item</h2>
      </div>
        <div class="row mb-4 g-5">
          <div class="col-md-6">
            <label for="productName" class="form-label fw-bold">Product Name</label>
            <input type="text" class="form-control" id="productName" name="product_name" required>
          </div>
          <div class="col-md-6">
            <label for="brand" class="form-label fw-bold">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand">
          </div>
        </div> 

        <div class="row mb-4 g-5">
          
          <div class="col-md-6">
            <label for="sellingPrice" class="form-label fw-bold">Selling Price</label>
            <input type="number"  class="form-control" id="sellingPrice" name="selling_price" required>
          </div>
          <div class="col-md-6">
            <label for="supplier" class="form-label fw-bold">Supplier</label>
            <input type="text" class="form-control" id="supplier" name="supplier">
          </div>
        </div>
        <div class="mb-3">
          <label for="notes" class="form-label fw-bold">Item Description</label>
          <textarea class="form-control" id="notes" name="description" rows="2" placeholder="write product decription..."></textarea>
        </div>
        <div class="d-flex justify-content-center w-100 gap-4">
          <a class="btn btn-secondary text-uppercase" href="dashboard.php">Close</a>
          <button type="submit" class="btn btn-success text-uppercase">Add Product</button>
        </div>
      </form>
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
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
