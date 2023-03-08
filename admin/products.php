<?php
session_start();
if(!isset($_SESSION['email'])){
  $_SESSION['redirectURL'] = $_SERVER['REQUEST_URL'];
  echo "<script>alert('Kindly Log in correctly ! Your account may be permernently diactivated !)</script>
  <script>window.location = 'log-ins/login.php'</script>";
}
?>

<?php
require_once '../includes/config.php';
$sql="SELECT * FROM admin where email='" . $_SESSION["email"] . "'";
$stmt = $DBH->prepare($sql);
$stmt->execute();
$total = $stmt->rowCount();
?>
<!-- add products -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['product'])){
  
  $productname = $_POST['productname'];
  $price = $_POST['price'];
  $productinfo = $_POST['productinfo'];
  $category = $_POST['category'];
  $products = $_POST['products'];
  $code = $_POST['code'];
  $productimage = $_FILES['productimage']['name'];
  
   // image file directory
   $target = "../assets/imgs/products/".basename($productimage);
  
    try {
        //code...
        $sql = 'INSERT INTO products(productname,price,productinfo,productimage,category,products,code,Date,Time ) VALUES(?,?,?,?,?,?,?,Now(),Now() ) ';
        $sth = $DBH->prepare($sql);
        $sth->execute(array($productname,$price,$productinfo,$productimage,$category,$products,$code));
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage(); 
      }
      echo "<script>alert('Added Successfully')</script>
	        <script>window.location = 'products.php'</script>";
    //uploading image
    if (move_uploaded_file($_FILES['productimage']['tmp_name'], $target)) {
      header("location:products.php");
      $msg = "products added successfully";
  	}else{
  		$msg = "Failed to upload file";
  	}

 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>grocershop admin</title>
  <link rel="icon" href="../assets/imgs/download.png" type="image/icon type">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <link rel="stylesheet"href="../assets/css/style.css">
  <link rel="stylesheet"href="../assets/css/form.css">

</head>
<body>
  
  <!--nav bar-->
 <?php
   require_once 'log-ins/header.php';
  ?>
  
  <div class="bg-light">
    <h3 class="text-center">Manage store</h3>
  </div>
  <!-- add products -->
  <main class="mt-5">
  <div class="container">
    <form action="products.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend style="border-radius: 25px;background-color: rgba(9, 100, 236, 0.8);"><h4 style="margin:15px;">Add products To store</h4></legend>
        <div class="columns">
          <div class="item">
            <label for="booktitle">Product Name<span>*</span></label>
            <input id="booktitle" type="text" name="productname" />
          </div>
          <div class="item">
            <label for="information"> Price of the Product<span>*</span></label>
            <input id="information" type="text" placeholder="Just inetegers eg 200" name="price" />
          </div>
          <div class="item">
            <label for="information"> Information about The Product<span>*</span></label>
            <input id="information" type="text" name="productinfo" />
          </div>
          <div class="item" style="display:none;">
            <label for="additional-information"> Information about The Product<span>*</span></label>
            <input id="information" type="text" name="products" value="products" />
          </div>
          <div class="item">
            <select name="category">
             <option value="" disabled selected>Select Category</option>
             <option value="fruits" >Fruits</option>
             <option value="vegetables">Vegetables</option>
             <option value="spices">Spices</option>
            </select>
          </div>
          <div class="item">
            <label for="information"> Enter Unique Code<span>*</span></label>
            <input id="information" type="text" placeholder="e.g pd1" name="code" />
          </div>
          <div class="item">
              <label for="cover">Post Pic Of the Product<span>*</span></label>
              <input type="file" name="productimage" >
          </div>
      </fieldset>
      <div class="btn-block">
        <button type="submit" name="product"style="border-radius: 25px;">Submit</button>
      </div>
    </form>
    
  </div>
  <!--- database products -->
  <div class="container">
     <?php
         require_once '../includes/config.php';
         if (isset($_POST['submit'])){

         $search = $_POST['search'];

         
        //code...
        $sql="SELECT * FROM products where (category LIKE '%" . $_POST["search"] . "%') OR (productname LIKE '%" . $_POST["search"] . "%') OR (productinfo LIKE '%" . $_POST["search"] . "%')OR (price LIKE '%" . $_POST["search"] . "%') OR (products LIKE '%" . $_POST["search"] . "%') ";
        $stmt = $DBH->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        
      }
      else{
        $sql="SELECT * FROM products ";
        $stmt = $DBH->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();
      }
      
     ?>
        <section class="text-center mb-4" >
        <?php
          $t = 0;
          while($row = $stmt->fetchObject()) {
            $t++;
                if($t == 1)
                {
        ?>
      <div class="row" style="display:flex;margin-top:20px;">

            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card" style="">
                <div
                  class="bg-image hover-overlay ripple"
                  data-mdb-ripple-color="light">
                  <img src="<?php echo "../assets/imgs/products/". "{$row->productimage}";?>"
                  class="img-fluid" style="max-width:295px; height:300px;" />
                  <a href="#!">
                    <div
                      class="mask"
                      style="background-color: rgba(251, 251, 251, 0.15)"> </div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo "{$row->productname}"; ?></h5>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <h6><?php echo "{$row->price}"; ?></h6>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
                  
                  <div class="tools" style="display:flex;margin-left:-40px;">
                      <script>
                       function editproduct() {
                          var x = document.getElementsByClassName("card-update");
                          var i=" "
                          for(var i = 0; i < x.length; i++){
                            if (x[i].style.display === "none") {
                                x[i].style.display = "block";
                                
                            }
                            else {
                           x[i].style.display = "none";
                           
                           } 
                          }
                          
                       }
                      </script>
                      
                    
                    <div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
                     <div class="edit" >
                       <button style="margin-top:20px;" class="button-admin" onclick=editproduct()>EDIT PRODUCT</button>
                     </div>
                     <form action="forms/delete.php" method="post" style="box-shadow:none;">
                        <input type="hidden" name="deleteproduct_id" value="<?php echo "{$row->id}"; ?>">
                        <button type="submit" class="button-admin2" name="deleteproduct_btn">DELETE PRODUCT</button>
                      </form>
                    </div>
                  </div>
                  <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                  <form action="forms/edit.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the Product</p></legend>
                      <div class="columns">
                        <div class="item">
                          <label for="booktitle">Product Name<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="information"> Price<span>*</span></label>
                          <input id="information" type="text" name="price" value="<?php echo "{$row->price}"; ?>" />
                        </div>
                        <div class="item">
                        <label for="information"> Category <span>*</span></label>
                          <select name="category" value="<?php echo "{$row->category}"; ?>" >
                          <option value="<?php echo "{$row->category}"; ?>"><?php echo "{$row->category}"; ?></option>
                           <option value="fruits" >Fruits</option>
                           <option value="vegetables">Vegetables</option>
                           <option value="spices">Spices</option>
                          </select>
                        </div>
                        <div class="item" style="display:none;">
                          <label for="additional-information"> Information about The Product<span>*</span></label>
                          <input id="information" type="text" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Product<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">Product<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="button-admin2" name="updateproduct"> SAVE </button>
                    </div>
                  </form>
                </div>
                

                </div>
                
                
              </div>
            </div>

          
        <?php
            }else if($t == 3){
              ?>
              <div class="col-lg-4 col-md-12 mb-4">
              <div class="card" style="">
                <div
                  class="bg-image hover-overlay ripple"
                  data-mdb-ripple-color="light">
                  <img
                    src="<?php echo "../assets/imgs/products/". "{$row->productimage}";?>"
                    class="img-fluid" style="max-width:295px; height:300px;" />
                  <a href="#!">
                    <div
                      class="mask"
                      style="background-color: rgba(251, 251, 251, 0.15)"
                    > </div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo "{$row->productname}"; ?></h5>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <h6><?php echo "{$row->price}"; ?></h6>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
                  <div class="tools" style="display:flex;margin-left:-40px;">

                    <div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
                     <div class="edit" >
                       <button style="margin-top:20px;" class="button-admin" onclick=editproduct()>EDIT PRODUCT</button>
                     </div>
                     <form action="forms/delete.php" method="post" style="box-shadow:none;">
                        <input type="hidden" name="deleteproduct_id" value="<?php echo "{$row->id}"; ?>">
                        <button type="submit" class="button-admin2" name="deleteproduct_btn">DELETE PRODUCT</button>
                      </form>
                    </div>
                  </div>
                  <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                  <form action="forms/edit.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the Product</p></legend>
                      <div class="columns">
                        <div class="item">
                          <label for="booktitle">Product Name<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="information"> Price<span>*</span></label>
                          <input id="information" type="text" name="price" value="<?php echo "{$row->price}"; ?>" />
                        </div>
                        <div class="item">
                        <label for="information"> Category <span>*</span></label>
                          <select name="category" value="<?php echo "{$row->category}"; ?>" >
                          <option value="<?php echo "{$row->category}"; ?>"><?php echo "{$row->category}"; ?></option>
                          <option value="fruits" >Fruits</option>
                           <option value="vegetables">Vegetables</option>
                           <option value="spices">Spices</option>
                          </select>
                        </div>
                        <div class="item" style="display:none;">
                          <label for="additional-information"> Information about The Product<span>*</span></label>
                          <input id="information" type="text" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Product<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">Product<span>*</span></label>
                      <input type="file" name="productimage"required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="button-admin2" name="updateproduct"> SAVE </button>
                    </div>
                  </form>
                </div>
                  
                </div>
              </div>
            </div>
      </div>    
            <?php
                  $t = 0;
                }else{
                  ?>

            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card" style="">
                <div
                  class="bg-image hover-overlay ripple"
                  data-mdb-ripple-color="light">
                  <img
                    src="<?php echo "../assets/imgs/products/". "{$row->productimage}";?>"
                    class="img-fluid" style="max-width:295px; height:300px;" />
                  <a href="#!">
                    <div
                      class="mask"
                      style="background-color: rgba(251, 251, 251, 0.15)"
                    > </div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo "{$row->productname}"; ?></h5>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <h6><?php echo "{$row->price}"; ?></h6>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
                  <div class="tools" style="display:flex;margin-left:-40px;">

                    <div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
                     <div class="edit" >
                       <button style="margin-top:20px;" class="button-admin" onclick=editproduct()>EDIT PRODUCT</button>
                     </div>
                      <form action="forms/delete.php" method="post" style="box-shadow:none;">
                        <input type="hidden" name="deleteproduct_id" value="<?php echo "{$row->id}"; ?>">
                        <button type="submit" class="button-admin2" name="deleteproduct_btn">DELETE PRODUCT</button>
                      </form>
                    </div>
                  </div>
                </div>
                <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                  <form action="forms/edit.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the Product</p></legend>
                      <div class="columns">
                        <div class="item">
                          <label for="booktitle">Product Name<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="information"> Price<span>*</span></label>
                          <input id="information" type="text" name="price" value="<?php echo "{$row->price}"; ?>" />
                        </div>
                        <div class="item">
                        <label for="information"> Category <span>*</span></label>
                          <select name="category" value="<?php echo "{$row->category}"; ?>" >
                          <option value="<?php echo "{$row->category}"; ?>"><?php echo "{$row->category}"; ?></option>
                          <option value="fruits" >Fruits</option>
                           <option value="vegetables">Vegetables</option>
                           <option value="spices">Spices</option>
                          </select>
                        </div>
                        <div class="item" style="display:none;">
                          <label for="additional-information"> Information about The Product<span>*</span></label>
                          <input id="information" type="text" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Product<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">Product<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="button-admin2" name="updateproduct"> SAVE </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
                }
            }
            if($t < 3){
              ?>
              </div>
              <?php
            }
            ?>      
            

          </section>
          <!-- end --->

          <style>
            /* button - admin */
          .button-admin {
            font-weight:bolder;
            font-size:15px;
            height:auto;
            padding:6px 10px;
            text-align:center;
            opacity: 1;
            background: aqua;
            color:black;
            border-radius:25px;
           }

           /* button - admin */
          .button-admin2 {
            font-weight:bolder;
            font-size:15px;
            height:auto;
            padding:6px 10px;
            text-align:center;
            opacity: 1;
            background: black;
            color:white;
            border-radius:25px;
           }
          </style>
        
      </div>
    </div>

  </main>

<!--footer-->
 <div class="conatiner-ft"style="margin-top:330px;">
 <?php
   require_once '../includes/footer.php';
  ?>
 </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <script type="text/javascript" src="../js/script1.js"></script>
  <!-- success message -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>