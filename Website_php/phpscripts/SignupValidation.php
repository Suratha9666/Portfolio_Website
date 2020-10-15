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

	if(isset($_POST['save'])){

		$name=$_POST['name'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$user=$_POST['user'];
		$password=$_POST['password'];
		$repeatpass=$_POST['repeatpassword'];

		$email_exp='/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/';
			$pass_exp='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/';

		if(!isset($name)){
			echo "<p><font color=red size='10pt'>Valid first name is required for signup</font></p>";
		}
		else if(!isset($lastname)){
			echo "<p><font color=red size='10pt'>Valid last name is required for signup</font></p>";
		}
		else if(!isset($email) || !preg_match($email_exp,$email)){
			echo "<p><font color=red size='10pt'>You entered an invalid email!</font></p>";
		}
		else if(!isset($user)){
			echo "<p><font color=red size='10pt'>User name is required for signup and it should be between 8 to 16 characters</font></p>";
		}
		else if(!isset($password) || !preg_match($pass_exp, $password)){
			echo "<p><font color=red size='10pt'>Password is required and must contain at least 6 characters, including UPPER/lowercase and numbers</font></p>";
		}
		else if(!isset($repeatpass) || ($password != $repeatpass)){
			echo "<p><font color=red size='10pt'>Password must be confirmed and both passwords should match</font></p>";
		}
		else{
			$insertQuery = "INSERT INTO users(first_name, last_name, user_name, email, password) VALUES ('$name', '$lastname', '$user', '$email', '$password')";
			if(mysqli_query($conn, $insertQuery)){
				echo "<p><font color=green size='10pt'>You have successfully signedup! Proceed to login</font></p>";
			}
			else{
				echo "<p><font color=red size='10pt'>Oops!There was some issue. Please try again.</font></p>";
			}
		}
	}

	$conn->close();

?>
