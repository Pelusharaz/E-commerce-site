
<!--navbar-->
  
<div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <img src="../assets/imgs/download.png" alt="logo" class="logo" width="70">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Users</a>
          </li>
          <!--orders-->
          <li class="nav-item">
            <a class="nav-link" href="orders.php">Orders</a>
          </li>
          <!--products-->
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <!--categories-->
          <li class="nav-item">
            <a class="nav-link" href="categories.php">categories</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex flex-row">
           <li class="nav-item me-3 me-lg-0 dropdown" >
           <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-mdb-toggle="dropdown"
               aria-expanded="false"
               aria-haspopup="true" >
               <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="log-ins/Register.php">Sign Up</a>
              <a class="dropdown-item" href="log-ins/login.php">Log in</a>
              <a class="dropdown-item" href="../includes/logout.php">Log Out</a>
            </div>
          </div>
           <?php
              while($row = $stmt->fetchObject()) {
              ?>
            <li class="nav-item">
              <a class="nav-link"href="#" >Welcome <?php echo "{$row->username}"; ?> to the admin panel</a>
            </li>
            <?php
                }
            ?>
            
        </ul>
         
      </div>
    </div>
  </nav>
  </div>