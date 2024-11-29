<?php
include '../dbcon/dbcon.php';

// Check for any POST or GET variables you might need here.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ward List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Lucida Sans', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .add-ward-button {
            background-color: orange;
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
            padding-left: 50px;
        }

        .update-delete-buttons {
            display: flex;
            gap: 10px;
        }

        .update-button {
            background-color: purple;
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
        <a href="ward.php" style="text-decoration: none; color: white;">ADD NEW WARD</a>
    </button>
    <nav>
        <button class="btn btn-primary my-5 add-patient-button"><a href="index.php"
                style="text-decoration: none; color: purple;">Home</a></button>
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
                <th>NUM_OF_PATIENTS</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT w.WARD_ID, w.WARD_NAME, w.NUMBER_OF_BEDS, w.NURSE_IN_CHARGE, w.WARD_TYPE, COUNT(p.patient_id) AS NUM_OF_PATIENTS
                    FROM ward w
                    LEFT JOIN patient p ON w.WARD_ID = p.WARD_ID
                    GROUP BY w.WARD_ID";
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $WARD_ID = $row['WARD_ID'];
                    $WARD_NAME = $row['WARD_NAME'];
                    $NUMBER_OF_BEDS = $row['NUMBER_OF_BEDS'];
                    $NURSE_IN_CHARGE = $row['NURSE_IN_CHARGE'];
                    $WARD_TYPE = $row['WARD_TYPE'];
                    $NUM_OF_PATIENTS = $row['number_of_patients'];

                    echo '<tr>
                        <td>' . $WARD_ID . '</td>
                        <td>' . $WARD_NAME . '</td>
                        <td>' . $NUMBER_OF_BEDS . '</td>
                        <td>' . $NURSE_IN_CHARGE . '</td>
                        <td>' . $WARD_TYPE . '</td>
                        <td>' . $NUM_OF_PATIENTS . '</td>
                        <td class="update-delete-buttons">
                            <button class="update-button">
                                <a href="ward_update.php?ward_updateid=' . $WARD_ID . '"
                                    style="text-decoration: none; color: white;">UPDATE</a>
                            </button>
                            <button class="delete-button">
                                <a href="delete_ward.php?ward_deleteid=' . $WARD_ID . '"
                                    style="text-decoration: none; color: white;">DELETE</a>
                            </button>
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
