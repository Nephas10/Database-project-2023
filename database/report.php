<?php
include 'dbcon/dbcon.php'; // Include your database connection file

// SQL query to retrieve patient and ward data
$sql = "SELECT p.patient_id, p.name, p.DOB, p.sex, w.ward_id
        FROM patient p
        LEFT JOIN ward w ON p.ward_id = w.ward_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <a href="display2.php">go back to ward</a>
    <h1>Patient Report</h1>

    <?php
    if ($result) {
    ?>

    <table>
        <tr>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Ward Name</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['patient_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['DOB']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['ward_id']; ?></td>
            </tr>
        <?php
        }
        ?>

    </table>

    <?php
    } else {
        echo 'Error: ' . $conn->error;
    }
    ?>

</body>
</html>

<?php
// Close the database connection

?>
