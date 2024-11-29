
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        .logo {
            margin-top: 20px;
        }

        #form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            font-size: 24px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="email"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="" alt="Logo">
        <h1>highland hospital or something</h1>
    </div>

    <div id="form">
        <h1>Login</h1>
        <form name="form" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="id">Enter ID:</label>
            <input type="text" id="id" name="id" required><br><br>
            <input type="submit" id="btn" value="Login" name="submit">
        </form>
    </div>
</body>
</html>
<?php
require("dbcon/dbcon.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $id = $_POST['id'];
    $select = "SELECT * FROM admin WHERE email_address = '$email' AND staff_id = $id"; // Combine both conditions in one query
    $query = mysqli_query($conn, $select);

    if ($query === false) {
        echo "cant find : " .mysqli_error($conn). " in the database";
    } elseif (mysqli_num_rows($query) > 0) {
        header('location: page.php');
        exit();
    } else {
        echo "Incorrect email or ID";
    }
    }
?>