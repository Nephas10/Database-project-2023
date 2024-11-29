<?php
include 'dbcon/dbcon.php';
if(isset($_GET['patient_id'])){
    $patient_id=$_GET['patient_id'];
    $delete = mysqli_query($conn, "DELETE FROM `patient` WHERE `patient_id`='$patient_id'" );
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="search-container">
    <form action="display.php" method="GET">
        <input type="text" name="search" placeholder="Search by ID..." />
        <button type="submit">Search</button>
        <p><a href="page.php">Home</a></p>
    </form>
</div>
    <div class="container">
        <a href="main/patient.php"><button class="btn btn-primary my-5">Add Patient</button></a>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">patient_id</th>
                <th scope="col">name</th>
                <th scope="col">initial</th>
                <th scope="col">sex</th>
                <th scope="col">address</th>
                <th scope="col">post_code</th>
                <th scope="col">addmission</th>
                <th scope="col">DOB</th>
                <th scope="col">ward_id</th>
                <th scope="col">next_of_kin</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>


<?php
$select = "SELECT * FROM patient";
$query = mysqli_query($conn, $select);
$num= mysqli_num_rows($query);
if($num>0){
    while($result=mysqli_fetch_assoc($query)){
    $patient_id=['patiant_id'];
    $name=['name'];
    $initial=['initial'];
    $sex=['sex'];
    $address=['address'];
    $post_code=['post_code'];
    $addmission=['admission'];
    $DOB=['DOB'];
    $ward_id=['ward_id'];
    $next_of_kin=['next_of_kin'];
    

    echo ' <tr scope="row">
                    <td>'.$result['patient_id'].'</td>
                    <td>'.$result['name'].'</td>
                    <td>'.$result['initials'].'</td>
                    <td>'.$result['sex'].'</td>
                    <td>'.$result['address'].'</td>
                    <td>'.$result['post_code'].'</td>
                    <td>'.$result['admission'].'</td>
                    <td>'.$result['DOB'].'</td>
                    <td>'.$result['ward_id'].'</td>
                    <td>'.$result['next_of_kin'].'</td>
                    <td>
                    <button class="btn btn-primary"><a href="patientupdate.php?updateid='.$result['patient_id'].'" class="text-light">Update</a></button>
                    </td>
                    <td>
                    <button class="btn btn-danger"><a href="display.php?patient_id='.$result['patient_id'].'" class="text-light">Delete</a></button>
                    </td>
                </tr>';
     }
   
}
$sql = "SELECT * FROM patient";
$result= mysqli_query($conn, $sql); 
?>


             
            </tbody>

        </table>
    </div>
</body>
</html>