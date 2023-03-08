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

<!-- add categories -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['addcategory'])){
  
  $category = $_POST['category'];
  
  
    try {
        //code...
        $sql = 'INSERT INTO categories(categories) VALUES(?) ';
        $sth = $DBH->prepare($sql);
        $sth->execute(array($category));
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage(); 
      }
      echo "<script>alert('Added Successfully')</script>
	        <script>window.location = 'categories.php'</script>";
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
  <link rel="stylesheet"href="assets/css/extrastyles.css">

</head>
<body>
  
  <!--nav bar-->
 <?php
   require_once 'log-ins/header.php';
  ?>
  
  <div class="bg-light">
    <h3 class="text-center">Smoby Groceries categories</h3>
  </div>
  

  <!-- users -->
<div class="container body">

<table class="table table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th scope="col"># Manage</th>
            <th scope="col">Categories</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <?php
     require_once '../includes/config.php';
      $sql="SELECT * FROM categories ";
      $stmt = $DBH->prepare($sql);
      $stmt->execute();
      $total = $stmt->rowCount();
    ?>
    <?php
          while($row = $stmt->fetchObject()) {
          ?>
        <tbody>
            <tr>
                <form action="forms/edit.php" method="POST">
                    <td scope="row"></td>
                    <td><input type="text" name="category" value=" <?php echo "{$row->categories}"; ?>"></td>
                    
                    
                    <td>
                        <input type="hidden" name="id" value=" <?php echo "{$row->id}"; ?>>">
                        <button class="button-admin" type="submit" name="editcategory">Edit</button>
                    </td>
                </form>
                <td>
                    <form action="forms/delete.php" method="POST">
                        <input type="hidden" name="id" value=" <?php echo "{$row->id}"; ?>">
                        <button type="submit" class="button-admin2" name="deletecategory">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
</table>

<table class="table table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th scope="col"># Add ctgr</th>
            <th scope="col">Categories</th>
            <th scope="col">Add</th>
          
        </tr>
    </thead>
   
        <tbody>
            <tr>
                <form action=" " method="POST">
                    <td scope="row"></td>
                    <td><input type="text" name="category" value=""></td>
                    
                    <td>
                        <button class="button-admin" type="submit" name="addcategory">Add</button>
                    </td>
                </form>
            </tr>
        </tbody>
       
</table>


</div>
<style>
/* button - admin */
.button-admin {
    height:auto;
    padding:6px 20px;
    text-align:center;
    opacity: 1;
    background: aqua;
    color:black;
    border-radius:25px;
   }
   .button-admin2 {
    height:auto;
    padding:6px 20px;
    text-align:center;
    opacity: 1;
    background: red;
    color:white;
    border-radius:25px;
   }
  </style>
    
  
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