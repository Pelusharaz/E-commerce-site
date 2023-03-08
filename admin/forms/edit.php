<!---update users--->
<?php
 require_once '../../includes/config.php';
 if (isset($_POST['edituser'])){

  $id = $_POST['id'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  
  

    try {
        //code...
        $sql = "UPDATE users SET username='$username',email='$email'  where id= '". $_POST["id"] ."' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "success.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('User edited Successfully')</script>
		  <script>window.location = '../index.php'</script>";

    }  
 ?>

 <!---update users--->
<?php
 require_once '../../includes/config.php';
 if (isset($_POST['editcategory'])){

  $id = $_POST['id'];
  $category = $_POST['category'];
  
  

    try {
        //code...
        $sql = "UPDATE categories SET categories='$category' where id= '". $_POST["id"] ."' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "success.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('category edited Successfully')</script>
		  <script>window.location = '../categories.php'</script>";

    }  
 ?>

<!-- Update products -->
<?php
 require_once '../../includes/config.php';
 if (isset($_POST['updateproduct'])){

  $id = $_POST['id'];
  $productname = $_POST['productname'];
  $price = $_POST['price'];
  $productinfo = $_POST['productinfo'];
  $category = $_POST['category'];
  $productimage = $_FILES['productimage']['name'];

  // image file directory
  $target = "../../assets/imgs/products/".basename($productimage);
  
  

    try {
        //code...
        $sql = "UPDATE products SET productname='$productname',price='$price',productinfo='$productinfo',category='$category',productimage='$productimage'  where id= '". $_POST["id"] ."' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('product edited Successfully')</script>
		  <script>window.location = '../products.php'</script>";

    //uploading image
    if (move_uploaded_file($_FILES['productimage']['tmp_name'], $target)){
      header("location:../products.php");
      $msg = "profile uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    }  
 ?>