<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<style>
        /* Add CSS styles for the navigation bar */
        nav {
            background-color: #007bff; /* Background color for the navigation bar */
            color: #fff; /* Text color for the navigation links */
            padding: 10px; /* Add some padding for spacing */
        }

        .logo {
            font-size: 24px; /* Adjust the logo font size */
            font-weight: bold;
        }
        body {
            background-image: url('b1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333; /* Text color on top of the background image */
            color: #333; /* Text color on top of the background image */
            margin: 0;
            padding: 0;
            height: 100%;
        }


        ul {
            list-style: none; /* Remove the default bullet points */
            padding: 0;
        }

        li {
            display: inline; /* Display the list items inline */
            margin-right: 20px; /* Add some margin between items */
        }

        a {
            text-decoration: none; /* Remove underline from links */
            color: #fff; /* Set the link color to white */
        }

        a.active {
            font-weight: bold; /* Style the active link differently */
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
    <h1>Welcome Admin</h1>
    <nav>
        <label class="logo"></label>
        <ul>
            <li><a class="active" href="main/patient.php">Add Patient</a></li>
            <li><a href="main/ward.php">Add Ward</a></li>
            <li><a href="">Services</a></li>
        </ul>
    </nav>
    <footer>
        &copy; nephas kango. All rights reserved.
    </footer>
</body>
</html>