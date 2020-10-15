<?php

	$servername = @"localhost";
	$username = "surathap_suratha";
	$password = "suratha9666";
	$dbname = "surathap_portfolio";
	$port = "3306";

	// Create connection
	$conn =  mysqli_connect($servername, $username, $password, $dbname, $port);

	// Check connection
	if (mysqli_connect_errno()) {
	    echo "Error occured while connecting to database ".mysqli_connect_errno();
	}

	if(isset($_POST['send'])){

		$name=$_POST['name'];
		$email=$_POST['email'];
		$comment=$_POST['message'];

		if(!isset($name)){
			echo "<p><font color=red size='10pt'>Name is Required to send message</font></p>";
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo "<p><font color=red size='10pt'>You entered an invalid email!</font></p>";
		}
		else if(!isset($comment)){
			echo "<p><font color=red size='10pt'>Please write a message to the admin</font></p>";
		}
		else{
			$insertQuery = "INSERT INTO contact_admin(sender_name, sender_email, message) VALUES ('$name', '$email', '$comment')";
			mysqli_query($conn, $insertQuery);
		}

		$to='surathapyari.bhupathiraju@mavs.uta.edu';
		$subject='Portfolio project discussion';
		$message=$_POST['name'].' message:'. " \r\n\r\n";
		$message .=$_POST['message'];
		$headers="From: ".$_POST['email']."\r\n";
		$success=mail($to, $subject, $message,$headers);
	}
	
	if(isset($success) && $success){
		echo "<p><font color=green size='10pt'>Your message has been sent!</font></p>";
	}
	else{
		echo "<p><font color=red size='10pt'>Sorry,there was a problem sending your message!</font></p>";
	}
?>
