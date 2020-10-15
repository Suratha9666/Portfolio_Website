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

	if(isset($_POST['getin'])){
		$name=$_POST['name'];
		$password=$_POST['password'];

		if(!isset($name)){
			echo "<p><font color=red size='10pt'>User name is required for login</font></p>";
		}
		else if(!isset($password)){
			echo "<p><font color=red size='10pt'>Password is required for login</font></p>";
		}
		
		$selectQuery = "SELECT user_name,password,user_role FROM users WHERE user_name='$name' AND password='$password'";
		$result=mysqli_query($conn, $selectQuery);
		$count  = mysqli_num_rows($result);
		if($count==0) {
			echo "<p><font color=red size='10pt'>Invalid Username or Password!</font></p>";
		} 
		else {
			$logged_in_user = mysqli_fetch_assoc($result);
			if ($logged_in_user['user_role'] == 'admin') {
			    $_SESSION['user'] = $logged_in_user;
				echo "<p><font color=green size='10pt'>You are successfully authenticated as Admin!</font></p>";
				echo "<a href='AdminHome.php'>GO TO ADMIN HOME PAGE</a>";	
			}
			else{
				$_SESSION['user'] = $logged_in_user;
				echo "<p><font color=green size='10pt'>You are successfully authenticated as User!</font></p>";
                echo "<a href='HomePage.php'>GO TO USER HOME PAGE</a>";
			}
			
		}
	}
?>