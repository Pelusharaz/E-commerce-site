<!-- delete users -->
<?php
 require_once '../../includes/config.php';
 if (isset($_POST['deleteuser'])){

    $id = $_POST['id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM users WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('user has been deleted successfully')</script>
		   <script>window.location = '../index.php'</script>"; 
    }
    
 ?>

<!-- delete order -->
<?php
 require_once '../../includes/config.php';
 if (isset($_POST['deleteorder'])){

    $id = $_POST['id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM orders WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Order has been deleted successfully')</script>
		   <script>window.location = '../orders.php'</script>"; 
    }
    
 ?>