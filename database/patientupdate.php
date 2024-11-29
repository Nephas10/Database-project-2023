<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
</head>
<body>
    <div class="container">
        <h2>update Patient</h2>

        <?php
        // Assuming you have a database connection established
       

include 'dbcon/dbcon.php';
$id=$_GET['updateid'];
$sql="SELECT * from `patient` where patient_id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    $patient_id=$row['patient_id'];
    $name=$row['name'];
    $initial=$row['initials'];
    $sex=$row['sex'];
    $address=$row['address'];
    $post_code=$row['post_code'];
    $admission=$row['admission'];
    $DOB=$row['DOB'];
    $ward_id=$row['ward_id'];
    $next_of_kin=$row['next_of_kin'];

if(isset($_POST['submit'])){
    $Patient_ID=$_POST['patient_id'];
    $Name=$_POST['name'];
    $Initial=$_POST['initial'];
    $Gender=$_POST['sex'];
    $Address=$_POST['address'];
    $Post_Code=$_POST['post_code'];
    
    $Date_of_Birth=$_POST['DOB'];
    $Ward_ID=$_POST['ward_id'];
    $Next_of_Kin=$_POST['next_of_kin'];

    $sql="UPDATE patient set patient_id='$Patient_ID',name='$Name',initials='$Initial',sex='$Gender',address='$Address',post_code='$Post_Code',admission='$admission',DOB='$Date_of_Birth',ward_id='$Ward_ID',next_of_kin='$Next_of_Kin' where patient_id='$id'";
    $result=mysqli_query($conn,$sql);

    if($result){
       header('location:display.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Patient</h1>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label>Patient_ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="patient_id" value=<?php echo $id; ?>>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" value=<?php echo $name; ?>>
            </div>
            <div class="form-group">
                <label>Initial</label>
                <input type="text" class="form-control" placeholder="Enter your initials" name="initial" value=<?php echo $initial; ?>>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" class="form-control" placeholder="Enter your Gender" name="sex" value=<?php echo $sex; ?>>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your Address" name="address" value=<?php echo $address; ?>>
            </div>
            <div class="form-group">
                <label>Post_Code</label>
                <input type="text" class="form-control" placeholder="post code" name="post_code" value=<?php echo $post_code; ?>>
            </div>
            <div class="form-group">
                <label>Admission</label>
                <input type="date" class="form-control" placeholder="Enter admission date" name="admission" value=<?php echo $admission; ?>>
            </div>
            <div class="form-group">
                <label>Date_of_Birth</label>
                <input type="date" class="form-control" placeholder="Date of Birth" name="DOB" value=<?php echo $DOB; ?>>
            </div>
            <div class="form-group">
                <label>Ward_ID</label>
                <input type="text" class="form-control" placeholder="Enter the ward id" name="ward_id" value=<?php echo $ward_id; ?>>
            </div>
            <div class="form-group">
                <label>Next_of_Kin</label>
                <input type="text" class="form-control" placeholder="Next of kin" name="next_of_kin" value=<?php echo $next_of_kin; ?>>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Upate</button>
        </form>
    </div>
</body>
</html>