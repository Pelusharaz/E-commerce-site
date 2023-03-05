<?php
session_start();
if(!isset($_SESSION['email'])){
  $_SESSION['redirectURL'] = $_SERVER['REQUEST_URL'];
  header('location:includes/login.php');
}
?>

<?php
require_once 'includes/config.php';
$sql="SELECT * FROM users where email='" . $_SESSION["email"] . "'";
$stmt = $DBH->prepare($sql);
$stmt->execute();
$total = $stmt->rowCount();
?>

<!-- cart -->
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

<!-- end -->

<!-- insertinto db -->
<?php
 require_once 'includes/config.php';
 if (isset($_POST['submit'])){
  
  $productname = array($_POST['productname']);
  $quantity = array($_POST['quantity']);
  $unitprice = array($_POST['unitprice']);
  $price = array($_POST['price']);
  // $quantity = $_POST['quantity'];
  // $unitprice = $_POST['unitprice'];
  // $price = $_POST['price'];
  $totalquantity = $_POST['totalquantity'];
  $totalprice = $_POST['totalprice'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $delivery = $_POST['delivery'];
  $information = $_POST['information'];
  $mpesa = $_POST['mpesa'];
  $checkbox = $_POST['checkbox'];

  foreach ($productname as $prodname) {
    $productname_val = implode(',', $prodname);
  }
  foreach ($quantity as $quant) {
    $quantity_val = implode(',', $quant);
  }
  foreach ($unitprice as $unitpric) {
    $unitprice_val = implode(',', $unitpric);
  }
  foreach ($price as $pric) {
    $price_val = implode(',', $pric);
  }
  try {
    //code...
    $sql = 'INSERT INTO orders(productname,quantity,unitprice,price,totalquantity,totalprice,name,phone,email,delivery,information,mpesa,checkbox,Date,Time ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,Now(),Now() )';
    $sth = $DBH->prepare($sql);
    $sth->execute(array($productname_val,$quantity_val,$unitprice_val,$price_val,$totalquantity,$totalprice,$name,$phone,$email,$delivery,$information,$mpesa,$checkbox ));
    $_SESSION['success'] = "message sent successfully.";
  } catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
  }
  echo "<script>alert('Ordered Successfully, Thank you For shopping with us')</script>
  <script>window.location = 'cart.php'</script>";
 }
 
 ?>
 <!-- end -->


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
  <link rel="stylesheet"href="assets/css/form.css">

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
           <li class="nav-item me-3 me-lg-0 dropdown" >
           <?php
              while($row = $stmt->fetchObject()) {
              ?>
            <li class="nav-item">
              <a class="nav-link"href="#" >Welcome <?php echo "{$row->username}"; ?></a>
            </li>
            <?php
                }
            ?>
        </ul>
         
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>
  </div>


  <main class="mt-5">
    <!-- Cart -->
    <div class="container" style="overflow:scroll; height:500px; max-width:950px;margin-bottom:10px;">
      <div id="shopping-cart">
       <div class="txt-heading">Shopping Cart</div>

        <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
          <?php
            if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
          ?>	
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
          <style>
            td,th{border:0px solid;}
          </style>
           <tbody>
             <tr>
                <th style="text-align:left;">Product</th>
                <th style="text-align:left;">Name</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:left;" width="12%">Unit Price</th>
                <th style="text-align:left;" width="12%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>	
          <?php		
            foreach ($_SESSION["cart_item"] as $item){
             $item_price = $item["quantity"]*$item["price"];
		      ?>
        <tr>
    <form action="cart.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
		    <td><img src="<?php echo "assets/imgs/products/". $item["productimage"]; ?>" class="product-image" style="max-width:100px; max-height:100px;" /></td>
        <td><input type="text" name="productname[]" value="<?php echo $item["productname"]; ?>" style="border:transparent;"></td>
        <td><input type="text" name="quantity[]" value="<?php echo $item["quantity"]; ?>" style="border:transparent;"></td>
        <td><input type="text" name="unitprice[]" value="<?php echo $item["price"]; ?> ksh" style="border:transparent;"></td>
				<td style="text-align:right;"><input type="text"name="price[]" value="<?php echo  number_format($item_price,2); ?>ksh" style="border:transparent;"></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="assets/imgs/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		    }
		    ?>
                <tr>
                  <td colspan="2" align="right">Total:</td>
                  <td align="right"><input type="text" name="totalquantity" value="<?php echo $total_quantity; ?>" style="border:transparent;"></td>
                  <td align="right" colspan="2"><strong><input type="text" name="totalprice" value="<?php echo number_format($total_price, 2); ?> ksh" style="border:transparent;font-weight:bold;"></strong></td>
                  <td></td>
                </tr>
            </tbody>
          </table>
          <button type="button"data-bs-toggle="modal" data-bs-target="#exampleModal" class="checkout">Check Out</button>
        

    <!-- form to insert cart items -->
    <!-- <div class="container" style="display:none;">
      <form action="contact&about.php" method="POST">
        <div class="columns">
            <div class="item">
              <label for="fname">Products</label>
              <input type="text" id="fname" name="firstname" value="<?php echo $item["productname"]; ?>" placeholder="Your name..">
            </div>
            <div class="item">
              <label for="lname">Names</label>
               <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            </div>
            <div class="item">
              <label for="country">Quantities</label>
              <input type="text" name="country" placeholder="Country">
            </div>
            <div class="item">
              <label for="email">Unit Prices</label>
              <input type="text" name="eaddress" placeholder="eg test@gmail.com" required>
            </div>
            <div class="item">
              <label for="phone">Total</label>
              <input type="text" name="phone" value="<?php echo number_format($total_price, 2); ?> ksh" placeholder="Enter phone number" required>
            </div>
        </div>

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" name="submit">
      </form>
    </div> -->
    <!-- end form -->
          
         <?php
        } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php 
        }
        ?>
      </div>
    </div>

   <!-- customer Contact/payment information -->
   <?php
    require_once 'includes/config.php';
    $sql="SELECT * FROM users where email='" . $_SESSION["email"] . "'";
    $stmt = $DBH->prepare($sql);
    $stmt->execute();
    $total = $stmt->rowCount();
   ?>
   <?php
      while($row = $stmt->fetchObject()) {
    ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <legend class="modal-title btn-primary" id="staticBackdropLabel" style="border-radius:20px; padding:5px;">Contact Information</legend>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
      <fieldset>
        
        <div class="columns">
          <div class="item">
            <label for="booktitle">Name<span>*</span></label>
            <input id="booktitle" type="text" name="name" value="<?php echo "{$row->username}"; ?>" required/>
          </div>
          <div class="item">
            <label for="information"> Phone<span>*</span></label>
            <input id="information" type="tel" name="phone" required />
          </div>
          <div class="item">
            <label for="information"> Email<span>*</span></label>
            <input id="information" type="email" name="email" value="<?php echo "{$row->email}"; ?>" required/>
          </div>
          <div class="item">
            <select style="padding-top:8px; padding-bottom:8px;margin-top:20px;" name="delivery" required>
             <option value="" disabled selected>Select Delivery Location</option>
             <option value="Ruiru">Ruiru</option>
             <option value="Nairobi CBD" >Nairobi CBD</option>
             <option value="Juja" >Juja</option>
             <option value="Kimbo" >Kimbo</option>
             <option value="Roysambu" >Roysambu</option>
             <option value="other" >Other(describe below)</option>
            </select>
          </div>
          
        </div>
        <div class="item">
            <label for="cover">Additional information<span>*</span></label>
            <textarea type="text" name="information"></textarea>
        </div>
        <!-- payment options -->
        <legend class="modal-title btn-primary" id="staticBackdropLabel" style="border-radius:20px; padding:5px;">Payment Information</legend>
        <div class="columns">
          <div class="item" style="display:flex;">
            <img src="assets/imgs/mpesa-icon.png" alt=""align="left" width="80">
            <input id="information" type="tel" name="mpesa" placeholder="enter m-pesa number" required />
          </div>
        </div>
        <!-- end -->
          <div class="item" style="display:flex;">
            <input id="information" type="checkbox" name="checkbox" required/>
            <label for="booktitle">I agree with Terms and conditions<span>*</span></label>
            <style>
              input[type=checkbox]{ 
              display: inline;
              margin-top:5px;
              width:8%;
            }
            </style>
         </div>
         <a href="includes/error.php">Terms and conditions</a>  
      </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary">Book Now!</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php
     }
  ?>
<!-- end customer Contact information -->

</main>
   <!-- end -->
  <!--footer-->
  <?php
   require_once 'includes/footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <script type="text/javascript" src="js/script1.js"></script>
</html>


