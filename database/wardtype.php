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
         
        </thead>
<?php
// Assuming you've already established a database connection

// Create a SQL query to join the "Ward" and "Patient" tables to fetch the required data
$sql = "SELECT
            W.ward_id,
            W.ward_name,
            W.number_beds - IFNULL(COUNT(P.patient_id), 0) AS Remaining_Beds,
            GROUP_CONCAT(P.name) AS patient_names
        FROM
            ward W
        LEFT JOIN
            patient P ON W.ward_id = P.ward_id
        GROUP BY
            W.ward_id, W.ward_name, W.number_beds";

$result = $conn->query($sql);

if ($result) {
    echo '<table>';
    echo '<tr scope="row">
            <th>Ward ID</th>
            <th>Ward Name</th>
            <th>Remaining Beds</th>
            
        </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $ward_id = $row['ward_id'];
        $ward_name = $row['ward_name'];
        $remaining_beds = $row['Remaining_Beds'];
       

        echo '<tr scope="row">
                <td>' . $ward_id . '</td>
                <td>' . $ward_name . '</td>
                <td>' . $remaining_beds . '</td>
                
               
            </tr>';
    }

    echo '</table>';
}

// Close the database connection

?>
