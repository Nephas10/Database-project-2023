<?php
include 'dbcon/dbcon.php';
if(isset($_GET['ward_deleteid'])){
    $ward_id=$_GET['ward_deleteid'];

    $sql="delete from `ward` where ward_id='$ward_id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted successfull";
       header('location:../dispaly2.php');
    }
    else{
         die(mysqli_error($conn));
    }
}
?>