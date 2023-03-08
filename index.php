<?php
  session_start();
   if(isset($_POST['session'])){

    if(isset($_SESSION['email'])){
      
      }
      else{
      echo "
        <script>alert('Kindly Log in to access your cart')</script>
        <script>window.location = 'includes/login.php'</script>
        ";
      }

  }
?>

<?php
      require_once("includes/config.php");
      $db_handle = new DBController();
      if(!empty($_GET["action"])) {
      switch($_GET["action"]) {
	    case "add":
        if(!empty($_POST["quantity"])) {
          $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
          $itemArray = array($productByCode[0]["code"]=>array('productname'=>$productByCode[0]["productname"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'productimage'=>$productByCode[0]["productimage"], 'productinfo'=>$productByCode[0]["productinfo"]));
          
          if(!empty($_SESSION["cart_item"])) {
            if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
              foreach($_SESSION["cart_item"] as $k => $v) {
                  if($productByCode[0]["code"] == $k) {
                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                      $_SESSION["cart_item"][$k]["quantity"] = 0;
                    }
                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                  }
              }
            } else {
              $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
            }
          } else {
            $_SESSION["cart_item"] = $itemArray;
          }
        }
      break;
      case "remove":
        if(!empty($_SESSION["cart_item"])) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($_GET["code"] == $k)
                unset($_SESSION["cart_item"][$k]);				
              if(empty($_SESSION["cart_item"]))
                unset($_SESSION["cart_item"]);
          }
        }
      break;
      case "empty":
        unset($_SESSION["cart_item"]);
      break;
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>grocershop</title>
  <link rel="icon" href="assets/imgs/download.png" type="image/icon type">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <link rel="stylesheet"href="assets/css/style.css">
  <link rel="stylesheet"href="assets/css/extrastyles.css">

</head>
<body>
  
  <!--navbar-->
  
  <div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <img src="assets/imgs/download.png" alt="logo" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <!--products-->
          <li class="nav-item">
            <a class="nav-link" href="index.php">Products</a>
          </li>
           <!--contacts-->
          <li class="nav-item">
            <a class="nav-link" href="index.php">Contacts</a>
          </li>
           <!--cart-->
           <?php
            if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
          ?>
          <?php		
            foreach ($_SESSION["cart_item"] as $item){
             $item_price = $item["quantity"]*$item["price"];
		      ?>
          <?php
				   $total_quantity += $item["quantity"];
				   $total_price += ($item["price"]*$item["quantity"]);
		       }
		      ?>	
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php echo $total_quantity; ?></sup></i>
            </a>
          </li>
          <?php
           } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup>0</sup></i>
            </a>
          </li>
          <?php 
           }
           ?>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Total Price /1500</a> <li class="nav-item">
            </li>
          </li> -->
        </ul>
        <ul class="navbar-nav d-flex flex-row">
           <li class="nav-item me-3 me-lg-0 dropdown" >
           <!-- session -->
            
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-mdb-toggle="dropdown"
               aria-expanded="false"
               aria-haspopup="true" >
               <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="includes/Register.php">Sign Up</a>
              <a class="dropdown-item" href="includes/login.php">Log in</a>
              <a class="dropdown-item" href="includes/logout.php">Log Out</a>
            </div>
          </div>
        </ul>
         
        <form class="d-flex" role="search" action="" method="POST">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit" name="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  </div>
  <!--second child-->
  <!-- <nav class="navbar.navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link"href="login.php" >login</a>
      </li>
    </ul>
  </nav> -->
  <!--Third child-->
  <div class="bg-light">
    <h3 class="text-center">Smoby Groceries</h3>
    <p class="text-center">Stock up your pantry with us.</p>
  </div>
  <div class="alertMsg" id="alertMsg">Product Successfully added to cart</div>
  <!-- success message -->
    <script>
      function showMsg()
      {
      $("#alertMsg").fadeIn('slow', function () {
      $(this).delay(1000).fadeOut('slow');
      });
    }
    </script>
    <style>
    .alertMsg
    {
     display:none;
     padding: 10px 6px;
     border: 1 px solid;
     background:lightgreen;
     bottom: 300px;
     position: fixed;
     z-index: 1;
     border-radius:20px;
    }
    </style>

  <!--corousel-->
 

  <!--fourth child-->
  <div class="row">
    <div class="col-md-10">
      <!---->
     
      <div id="product-grid" class="row products">
          <?php
          if (isset($_POST['submit'])){
            $search = $_POST['search'];
            $product_array = $db_handle->runQuery("SELECT * FROM products where (category LIKE '%" . $_POST["search"] . "%') OR (productname LIKE '%" . $_POST["search"] . "%') OR (productinfo LIKE '%" . $_POST["search"] . "%')OR (price LIKE '%" . $_POST["search"] . "%') OR (products LIKE '%" . $_POST["search"] . "%')");
            if (!empty($product_array)) { 
              foreach($product_array as $key=>$value){
                ?>
          <div class="product-item card" style="width:310px;height:480px;">
          <iframe name="votar" style="display:none;"></iframe>
            <form method="post" target="votar" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" onsubmit="showMsg()">
            <div class="product-image"><img src="<?php echo "assets/imgs/products/".$product_array[$key]['productimage'];?>" style="max-width:295px; max-height:200px;"></div>
            <div class="product-tile-footer"><br><br><br>
            <div class="product-title"><h5><?php echo $product_array[$key]["productname"]; ?></h5>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <h6><?php echo $product_array[$key]["price"]; ?> ksh</h6>
            <p class="card-text">
              <?php echo $product_array[$key]["productinfo"]; ?>
            </p>
          </div> 
          <div class="cart-action">
          <div id="field1" class="btn btn-dark">QTY
            <!-- <button type="button" id="sub" class="sub">-</button> -->
            <input type="number" name="quantity" id="1" value="1" min="1" style="width:50px;" required/>
            <!-- <button type="button" id="add" class="add">+</button> -->
          </div>


           <!-- plus and minus button  -->
          <script>
             $(document).ready(function(){
             $('.add').click(function () {
             if ($(this).prev().val() > 1) {
           $(this).prev().val(+$(this).prev().val() + 1);
            }
           });
           $('.sub').click(function () {
           if ($(this).next().val() > 1) {
           if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
            }
           });
           });
          </script>
          
          <form action="index.php">
            <input type="submit" name="session" value="Add to Cart" class="btnAddAction" onclick="session()"/>
           </form>
        
        </div>
        </div>
        </form>
		    </div>
        <?php
        }
      }
    }else{
    $product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC ");
	  if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
    <div class="product-item card" style="width:310px;height:480px;">
    <iframe name="votar" style="display:none;"></iframe>
			<form method="post" target="votar" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" onsubmit="showMsg()">
			<div class="product-image"><img src="<?php echo "assets/imgs/products/".$product_array[$key]['productimage'];?>" style="max-width:295px; max-height:200px;"></div>
			<div class="product-tile-footer"><br><br><br>
			<div class="product-title"><h5><?php echo $product_array[$key]["productname"]; ?></h5>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <h6><?php echo $product_array[$key]["price"]; ?> ksh</h6>
        <p class="card-text">
          <?php echo $product_array[$key]["productinfo"]; ?>
        </p>
      </div> 
			<div class="cart-action" style="display:flex;">
          <div id="field1" class="btnAddAction" style="background-color: #211a1a; color:white;">QTY
            <!-- <button type="button" id="sub" class="sub">-</button> -->
            <input type="number" name="quantity" id="1" value="1" min="1" style="width:50px;" required/>
            <!-- <button type="button" id="add" class="add">+</button> -->
          </div>


           <!-- plus and minus button  -->
          <script>
             $(document).ready(function(){
             $('.add').click(function () {
             if ($(this).prev().val() > 1) {
           $(this).prev().val(+$(this).prev().val() + 1);
            }
           });
           $('.sub').click(function () {
           if ($(this).next().val() > 1) {
           if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
            }
           });
           });
          </script>
        <form action="index.php">
          <input type="submit" name="session" value="Add to Cart" class="btnAddAction" onclick="session()"/>
        </form>
        
      </div>
			</div>
			</form>
    </div>
    <?php
        }
      }
    }
    ?>
    </div>
      <!--products-->
    </div>
    <div class="col-md-2 bg-secondary p-0">
      <!-- <ul class="navbar-nav me-auto">
        <li class="nav-item bg-info">
          Brands
          <a href="#" class="nav-link text-center text-light"><h4>Brands</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>Brand1</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>Brand2</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>Brand3</h4> </a>
        </li>

      </ul> -->
      <?php
       require_once 'includes/config.php';
       $sql="SELECT * FROM categories ";
       $stmt = $DBH->prepare($sql);
       $stmt->execute();
       $total = $stmt->rowCount();
      ?>
      
      <ul class="navbar-nav me-auto ">
        <li class="nav-item bg-info">
          <!--categories-->
          <a href="#" class="nav-link text-center text-light"><h4>Categories</h4> </a>
        </li>
        
        <?php
              while($row = $stmt->fetchObject()) {
              ?>
        <form action="" method="POST">
        <div class="nav-item ">
          <input type="text" name="search" value="<?php echo "{$row->categories}"; ?>" style="display:none;">
          <button type="submit" name="submit" class="category" style="border: none; color:white; background-color: transparent;"><h4><?php echo "{$row->categories}"; ?></h4> </button>
        </div>
        </form>
      </ul>
      <?php
                }
            ?>
      
    </div>
  </div>
  
 <!--footer-->
 <?php
   require_once 'includes/footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <script type="text/javascript" src="js/script1.js"></script>
  <!-- success message -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>