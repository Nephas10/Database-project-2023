<?php 
	require_once('../dbcon/dbcon.php');
	if ($_SERVER['REQUEST_METHOD']== 'POST') {
		$email = $_POST['email'];
		$id = $_POST['id'];
		
		$sql = "SELECT * FROM staff WHERE email_address = $email";
		$sqlresults = mysql_query($conn, $sql);
		if (mysql_num_rows($sqlresults) > 0) {mysqli
			header('LOCATION: /main/patient.php');
			echo "connection failed".mysql_errno();
		}
		else{
			
		}
	}




 ?>