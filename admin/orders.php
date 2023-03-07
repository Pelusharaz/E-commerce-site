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
    <h3 class="text-center">Smoby Groceries Orders</h3>
  </div>
  

  <!-- users -->
<div class="container body" style="overflow:scroll;">

<table class="table table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Unit price</th>
            <th scope="col">Price</th>
            <th scope="col">Total Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Delivery</th>
            <th scope="col">Information</th>
            <th scope="col">M-pesa no</th>
            <th scope="col">Terms</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Approve</th>
            <th scope="col">Decline</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <?php
     require_once '../includes/config.php';
      $sql="SELECT * FROM orders ";
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
                    <td><input type="text" name="username" value=" <?php echo "{$row->productname}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->quantity}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->unitprice}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->price}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->totalquantity}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->totalprice}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->name}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->phone}"; ?>"></td>
                    <td><input type="text" name="email" value=" <?php echo "{$row->email}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->delivery}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->information}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->mpesa}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->checkbox}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->Date}"; ?>"></td>
                    <td><input type="text" name="username" value=" <?php echo "{$row->Time}"; ?>"></td>

                </form>
                <td><a href="mailto:<?php echo "{$row->email}"; ?>?&subject=Subject : Smoby Grocers Order Approval&body=Dear <?php echo "{$row->name}"; ?>, " target="_blank"><button  class="button-admin3">APPROVE</button></a></td>
                <td><a href="mailto:<?php echo "{$row->email}"; ?>?&subject=Subject : Smoby Grocers Order Decline&body=Dear <?php echo "{$row->name}"; ?>, " target="_blank"><button  class="button-admin">DECLINE</button></a></td>
                <td>
                    <form action="forms/delete.php" method="POST">
                        <input type="hidden" name="id" value=" <?php echo "{$row->id}"; ?>">
                        <button type="submit" class="button-admin2" name="deleteorder">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
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
   .button-admin3 {
    height:auto;
    padding:6px 20px;
    text-align:center;
    opacity: 1;
    background: green;
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