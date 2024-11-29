<?php
include 'dbcon/dbcon.php';

// Check for any POST or GET variables you might need here.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ward List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .add-ward-button {
            background-color: blue;
            border: none;
            border-radius: 8px;
        }

        .table {
            margin-top: 20px;
        }

        .table th {
            font-size: 15px;
        }

        .table td {
            padding-left: 40px;
        }

        .update-delete-buttons {
            display: flex;
            gap: 10px;
        }

        .update-button {
            background-color: blue;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            color: white;
        }

        .delete-button {
            background-color: red;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <button class="btn btn-primary my-5 add-ward-button">
        <a href="main/ward.php" style="text-decoration: none; color: white;">ADD NEW WARD</a>
    </button>
    <nav>
    </nav>

    <h3>WARD LIST</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>WARD_ID</th>
                <th>WARD_NAME</th>
                <th>NUMBER_OF_BEDS</th>
                <th>NURSE_IN_CHARGE</th>
                <th>WARD_TYPE</th>
                <th>Operations</th>
                <th>Operations</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
          /*  $sql = "SELECT w.ward_id, w.ward_name, w.number_beds, w.nurse_in_charge, w.ward_type, COUNT(p.patiant_id) AS num_of_patients
                    FROM ward w
                    LEFT JOIN patiant p ON w.ward_id = p.ward_id
                    GROUP BY w.ward_id";
                    $sml= "SELECT * FROM ward";*/
             $sql="select * from `ward`";
            $result = $conn->query($sql);

              
            
            if($result){
                 while($row=mysqli_fetch_assoc($result)){
                $ward_id=$row['ward_id'];
                $ward_name=$row['ward_name'];
                $number_beds=$row['number_beds'];
                $nurse_in_charge=$row['nurse_in_charge'];
                $ward_type=$row['ward_type'];
                
                
            
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
