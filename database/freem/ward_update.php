<?php

include 'connect.php';
$id=$_GET['ward_updateid'];
$sql="select * from `ward` where ward_id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
    $ward_name=$row['ward_name'];
    $number_beds=$row['number_beds'];
    $nurse_in_charge=$row['nurse_in_charge'];
    $ward_type=$row['ward_type'];

if(isset($_POST['submit'])){
    $Ward_ID=$_POST['ward_id'];
    $Ward_Name=$_POST['ward_name'];
    $Number_Beds=$_POST['number_beds'];
    $Nurse_in_Charge=$_POST['nurse_in_charge'];
    $Ward_Type=$_POST['ward_type'];

    $sql="update `ward` set ward_id='$Ward_ID',ward_name='$Ward_Name',number_beds='$Number_Beds',nurse_in_charge='$Nurse_in_Charge',ward_type='$Ward_Type' where ward_id='$id'";
    $result=mysqli_query($con,$sql);

    if($result){
        echo "Updated successfully";
       header('location:ward_display.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Wards</h1>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label>Ward_ID</label>
                <input type="text" class="form-control" placeholder="Enter the ward ID" name="ward_id" value=<?php echo $id; ?>>
            </div>
            <div class="form-group">
                <label>Ward Name</label>
                <input type="text" class="form-control" placeholder="Enter your The Ward Name" name="ward_name" value=<?php echo $ward_name; ?>>
            </div>
            <div class="form-group">
                <label>Number of Beds</label>
                <input type="text" class="form-control" placeholder="Enter The Number of beds" name="number_beds" value=<?php echo $number_beds; ?>>
            </div>
            <div class="form-group">
                <label>Nurse in Charge</label>
                <input type="text" class="form-control" placeholder="Enter Nurse in charge" name="nurse_in_charge" value=<?php echo $nurse_in_charge; ?>>
            </div>
            <div class="form-group">
                <label>Ward Type</label>
                <input type="text" class="form-control" placeholder="Enter the ward type" name="ward_type" value=<?php echo $ward_type; ?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>