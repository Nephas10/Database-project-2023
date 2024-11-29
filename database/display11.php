<?php
include 'dbcon/dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ward_Display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="main/ward.php"><button class="btn btn-primary my-5">Add Ward</button></a>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">ward_id</th>
                <th scope="col">ward_name</th>
                <th scope="col">number_beds</th>
                <th scope="col">nurse_in_charge</th>
                <th scope="col">ward_type</th> 
                <th scope="col">NUM_OF_PATIENTS</th>             
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
                <th scope="col">view</th>
                </tr>
            </thead>
            <tbody>


<?php

$sql="select * from `ward`";
$result=mysqli_query($conn,$sql);
if($result){
     while($row=mysqli_fetch_assoc($result)){
    $ward_id=$row['ward_id'];
    $ward_name=$row['ward_name'];
    $number_beds=$row['number_beds'];
    $nurse_in_charge=$row['nurse_in_charge'];
    $ward_type=$row['ward_type'];
    $NUM_OF_PATIENTS = $row['NUM_OF_PATIENTS'];
    

    echo ' <tr scope="row">
                    <td>'.$ward_id.'</td>
                    <td>'.$ward_name.'</td>
                    <td>'.$number_beds.'</td>
                    <td>'.$nurse_in_charge.'</td>
                    <td>'.$ward_type.'</td>
                    <td>
                    <button class="btn btn-primary"><a href="ward_update.php? ward_updateid='.$ward_id.'" class="text-light">Update</a></button>
                    </td>
                    <td>
                    <button class="btn btn-danger"><a href="wardelete.php? ward_deleteid='.$ward_id.'" class="text-light">Delete</a></button>
                    </td>
                    <td>
                    <button class="btn btn-warning"><a href="wardtype.php? view_id='.$ward_id.'" class="text-light">view</a></button>
                    </td>
                </tr>';
     }
   
}
   
?>

            </tbody>

        </table>
    </div>
</body>
</html>
