<?php
include 'dbcon/dbcon.php';

$id = $_GET['ward_updateid'];
$sql = "select * from `ward` where ward_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$number_beds = $row['number_beds'];
$nurse_in_charge = $row['nurse_in_charge'];
$ward_type = $row['ward_type'];

if (isset($_POST['submit'])) {
    $Number_Beds = $_POST['number_beds'];
    $Nurse_in_Charge = $_POST['nurse_in_charge'];
    $Ward_Type = $_POST['ward_type'];

    // Update only the specific ward based on its ward_id
    $sql = "UPDATE `ward` SET number_beds = '$Number_Beds', nurse_in_charge = '$Nurse_in_Charge', ward_type = '$Ward_Type' WHERE ward_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Updated successfully";
        header('location:display2.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Update Ward</title>
</head>
<body>
    <h1>Update Ward</h1>
    <form action="" method="post">
        <div>
            <label for="number_beds">Number of Beds:</label>
            <input type="text" name="number_beds" value="<?php echo $number_beds; ?>" required>
        </div>
        <div>
            <label for="nurse_in_charge">Nurse in Charge:</label>
            <input type="text" name="nurse_in_charge" value="<?php echo $nurse_in_charge; ?>" required>
        </div>
        <div>
            <label for="ward_type">Ward Type:</label>
            <input type="text" name="ward_type" value="<?php echo $ward_type; ?>" >
        </div>
        <div>
            <input type="submit" name="submit" value="Update">
        </div>
    </form>
</body>
</html>