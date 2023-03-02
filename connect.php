<?php
$con=mysqli_connect('localhost','root','','onlinegrocer');
if($con){
    echo "connection successfull";
}
    else{
        die(mysqli_error($con));
    }
    


?>