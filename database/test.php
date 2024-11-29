<html>
<head>
        <title>
        Connection
        </title>
    </head>
   
<style>
        *{
            padding:0;
            margin: 0;
            box-sizing: border-box;
        }   body{
            background-image: url(photoes/bj.jpg);
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }
        .menu-bar{
            background-color: gray;
            text-align: center;
        }
        .menu-bar ul{
            display: inline-flex;
            list-style: none;
            color: black;
        }
        .menu-bar ul li{
            width: 120px;
            margin: 15px;
            padding: 15px;
        }
        .menu-bar ul li a{
            text-decoration: none;
            color: black;
        }
        .active,.menu-bar ul li :hover{
            background-color: white;
            border-radius: 2px;
        }

.container {
	display: none;
	position: absolute;
	width: 400px;
	height:400px;
	overflow: hidden;
	overflow-y: scroll;
    background-color:whitesmoke;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
}

.main-container{
	margin: auto;
	width: fit-content;
	
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #007bff;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    width: 100%;
}

button:hover {
    background-color: #0056b3;
}

		
    </style>
<body>
    	<?php
    		require_once('../dbcon/dbcon.php');
    	?>
    <div class="menu-bar">
        <ul>
            <li><a href="#" onclick="patient()">PATIENTS</a></li>
            <li><a href="#" onclick="ward()">WARD</a></li>
            
        </ul>
    </div>

    <div style="position: relative;" class="main-container">
	    <div class="container" id="patient">
	        <h1>Patient Information Form</h1>
	        <form action="main.php" method="post">
	            <div class="form-group">
	                <label for="patient_id">Patient ID:</label>
	                <input type="text" id="patientID" name="patientID" required>
	            </div>
	            <div class="form-group">
	                <label for="wardNumber">name:</label>
	                <input type="text" id="patientName" name="patientName" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">initails:</label>
	                <input type="text" id="initails" name="initails" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">sex:</label>
	                <input type="text" id="sex" name="sex" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">address:</label>
	                <input type="text" id="bedNumber" name="address" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">postCode:</label>
	                <input type="text" id="bedNumber" name="postCode" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">admission:</label>
	                <input type="text" id="bedNumber" name="admission" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">DOB:</label>
	                <input type="text" id="bedNumber" name="dob" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">wardId:</label>
	                <input type="text" id="bedNumber" name="wardId" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">next_of_kin:</label>
	                <input type="text" id="bedNumber" name="next_of_kin" required>
	            </div>
	            <input type="submit" value="submit">
				<lnput type="button"><a href=../display.php>view patients</a></lnput>
	        </form>

	        <?php
	        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	        	$patientId = $_POST['patientID'];
	        	$patientName = $_POST['patientName'];
	        	$initails = $_POST['initails'];
	        	$sex = $_POST['sex'];
	        	$address = $_POST['address'];
	        	$postCode = $_POST['postCode'];
	        	$admission = $_POST['admission'];
	        	$dob = $_POST['dob'];
	        	$wardId = $_POST['wardId'];
	        	$next_of_kin = $_POST['next_of_kin'];

	        	$insert = "INSERT INTO patient (patient_id, name, initials, sex, address,post_code, admission , DOB, ward_id, next_of_kin) VALUES ('$patientId','$patientName', '$initails', '$sex', '$address', '$postCode', '$admission', '$dob', '$wardId', '$next_of_kin')";
	        	$results = mysqli_query($conn, $insert);
	        	if (!$results) {
	        		echo die(mysqli_error($conn));
	        	}
	        	else{
	        		echo "data succcesfuly inserted into the system";
	        		
	        	}
	        }

	        ?>
	    </div>

	    <div class="container" id="ward">
	        <h1>Ward Form</h1>
	        <form action="connect.php" method="post">
	            <div class="form-group">
	                <label for="name">Ward ID:</label>
	                <input type="text" id="name" name="ward_id" required>
	            </div>
	            <div class="form-group">
	                <label for="patient_id">Ward Name:</label>
	                <input type="text" id="patientID" name="ward_name" required>
	            </div>
	            <div class="form-group">
	                <label for="wardNumber">Number OF beds:</label>
	                <input type="text" id="Number" name="number_beds" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">Nurse IN charge:</label>
	                <input type="text" id="nurse" name="nurse_in_charge" required>
	            </div>
	            <div class="form-group">
	                <label for="bedNumber">Ward Type:</label>
	                <input type="text" id="type" name="ward_type" required>
	            </div>
	            <button type="submit">Submit</button>
				<input type="button"><a href="../display2.php">view wards</a></input>
	        </form>
	    </div>
    </div>
	<?php
		


	?>
    
    <script>
    	var x = document.getElementById('patient');
    	var y = document.getElementById('ward');
    	function patient() {
    		x.style.display = "block";
    		y.style.display = "none";
    	}
    	function ward() {
    		x.style.display = "none";
    		y.style.display = "block";
    	}

    	
    </script>
   
    </body>
</html>
