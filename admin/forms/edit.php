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