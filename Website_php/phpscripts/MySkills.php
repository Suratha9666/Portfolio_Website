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

	$selectQuery = "SELECT * FROM work_experience";
	$result=mysqli_query($conn, $selectQuery);

	while ($row = mysqli_fetch_array($result)) {
        $roles[]=strtoupper($row['role']);
        $organizations[]=strtoupper($row['organization']);
        $from_dates[]=$row['from_date'];
        $to_dates[]=$row['to_date'];
        $descriptions[]=$row['description'];
        $ids[]=$row['work_id'];
    }

    $dates = array();
    foreach($from_dates as $key=>$val){ 
        $val2 = $to_dates[$key]; 
        $dates[$key] = $val.' - '.$val2;
    }

    $select = "SELECT * FROM education";
	$res=mysqli_query($conn, $select);

	while ($entry = mysqli_fetch_array($res)) {
        $degree_names[]=strtoupper($entry['degree_name']);
        $field_of_studies[]=strtoupper($entry['field_of_study']);
        $start_dates[]=$entry['start_date'];
        $end_dates[]=$entry['end_date'];
        $universities[]=$entry['university'];
        $degrees[]=$entry['degree_id'];
    }

    $years = array();
    foreach($start_dates as $key1=>$val1){ 
        $val3 = $end_dates[$key1]; 
        $years[$key1] = $val1.' - '.$val3;
    }

    $rights=array();
    foreach($roles as $key5=>$val4){ 
        $val5 = $descriptions[$key5]; 
        $rights[$key5] = $val4.' - '.$val5;
    }

    $edus=array();
    foreach($field_of_studies as $key6=>$val6){ 
        $val7 = $universities[$key6]; 
        $edus[$key6] = $val6.' - '.$val7;
    }
?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MySkills</title>
	<link rel="stylesheet" type="text/css" href="Style/portfolio.css">
	<script type="text/javascript" src="Script/script.js"></script>
	<script type="text/javascript" src="Script/ValidationScript.js"></script>
</head>
<body id="skills">

	<!-- Header NavBar -->
	<header>
		<nav>
			<h1 align="left">Suratha Pyari BH</h1>
			<div class="topnav-right">
				<a href="HomePage.php">HOME</a>
		  		<a href="MySkills.php">MY SKILLS</a>
		  		<a href="Recommendation.php">RECOMMENDATION</a>
		  		<a href="Works.php">WORKS</a>
		  		<a href="http://surathapyari.uta.cloud">BLOG</a>
		  		<a href="HireMe.php">HIRE ME</a>
		  		<button id="button" onclick="show()">LOG IN</button>
		  		<button id="button" onclick="popup()">SIGN UP</button>
		  	</div>
		</nav>
	</header>

	<!-- Skills and Expertise Section -->
	<section>
		<p id="skillh1"><strong>SKILLS &<br>EXPERTISE</strong></p>
		<br>
		<p id="skillp">Full-Stack Developer</p>
		<br>
		<figure id="image">
			<img src="Images/My-Image.jpeg" alt="Suratha" width="250" height="300">
		</figure>
	</section>
	<article class="skills">
		<div class="leftdesc">
			<img src="Images/Branding-Icon.png" alt="branding-icon" width="50" height="50">
			<h3 class="icon">Branding</h3>
			<p class="paraex">Creating logos and posters for<br>your company.</p>
			<img src="Images/Design-Icon.png" alt="design-icon" width="50" height="50">
			<h3 class="icon">Design</h3>
			<p class="paraex">Maintaining the quality and<br>productivity in the works to please<br>my clients.</p>
		</div>
		<div class="rightdesc">
			<img src="Images/Marketing-Icon.png" alt="marketing-icon" width="50" height="50">
			<h3 class="icon">Marketing</h3>
			<p class="para">Trend designs for a better <br>experience of both images, logos<br>and websites.</p>
			<img src="Images/Programming-Icon.png" alt="programming-icon" width="50" height="50">
			<h3 class="icon">Programming</h3>
			<p class="para">Developing applications and<br>systems that meet the needs and<br>streamline the work and<br>experiences of users.</p>
		</div>
	</article>
	
	<!-- Smart Digital Solutions -->
	<article class="tabo">
		<p id="paranext"><strong id="part">Smart Digital Solutions </strong> A Full-Stack Developer</p>
		<figure align="center" id="smart">
			<img src="Images/device01.png" alt="device1" width="110" height="110">
			<img src="Images/device02.png" alt="device2" width="100" height="100">
			<img src="Images/device03.png" alt="device3" width="100" height="100">
		</figure>
	</article><br><br><br><br><br><br><br><br><br><br><br><br>

	<!-- Work Experience Section -->
	<article id="workexperience">
		<h1 class="leftspc">WORK EXPERIENCE</h1>
		<p class="spc">I want to look back on my career and be proud of the work, <br> and be proud that I tried everything. --Jon Stewart</p>
		<?php echo $regValue; ?>
	</article>
	<form name="form1" action="AddWork.php" method="post">
		<button id="buttonx" name="formVar" style="float:right;margin-right:250px;font-size: 17px;padding: 4px;display: none;">ADD WORK EXPERIENCE</button> <br><br><br>
	</form>
    <section id="workexp">
	    <table>
	        <tr>
	           <td>
	                <article class="workleft" style='margin-left:100px;margin-top:0px;'>
		                <?php foreach(array_combine($dates,$organizations) as $date => $organization) { ?>
			            <p class="year" style='width:200px;text-align:right;'><strong><?php echo $date; ?></strong></p><br><br><br><br>
			            <h2 style='width:200px;text-align:right;'><strong><?php echo $organization; ?></strong></h2><br><br><br><hr class="workhr"><br><br><br><br><br> <?php } ?>
		            </article>
	           </td>
	           <td>
	               <div class="workright1" style='margin-left:100px;margin-top:-100px;'>
    			        <?php foreach(array_combine($rights,$ids) as $right => $id) { ?>
    			        <?php echo "<p >".str_replace('-', '<br /><br/>', $right); "</p>"?>
    			        
    			        
    			        <form name="form2" action="EditWork.php?id=<?php echo $id; ?>" method="post">
    			        	<button name="edit" style="margin-left:60px;font-size: 17px;padding: 4px;display: none;">EDIT</button>
    			        </form>
    			        <br>
    			        <form name="form3" action="DeleteWork.php?id=<?php echo $id; ?>" method="post">
							<button disabled onclick="alert('Are you sure you want to delete this record?')" style="margin-left:60px;font-size: 17px;padding: 4px;display: none;">DELETE</button><br><br><br><br>
						</form>
    			        <?php }"</p>" ?>
		            </div>
	           </td>
	       </tr>
	   </table>
	</section>
	
	<!-- Education Section -->
	<article id="education">
		<h1 class="leftspc">EDUCATION</h1>
		<p class="spc1">I want to look back on my career and be proud of the work, <br> and be proud that I tried everything. --Jon Stewart</p>
	</article>
	<form name="form4" action="AddEducation.php" method="post">
		<button name="addedu" style="float:right;margin-right:250px;font-size: 17px;padding: 4px;display: none;">ADD EDUCATION</button> <br><br>
	</form>
    <section id="education">
	    <table>
	        <tr>
	           <td>
	                <article class="eduleft" style='margin-left:100px;margin-top:0px;'>
		                <?php foreach(array_combine($years,$degree_names) as $year => $degree_name) { ?>
			            <p class="year" style='width:210px;text-align:right;'><strong><?php echo $year; ?></strong></p><br><br><br><br>
			            <h2 style='width:200px;text-align:right;'><strong><?php echo $degree_name; ?></strong></h2><br><br><br><hr class="workhr"><br><br><br><br><br> <?php } ?>
		            </article>
	           </td>
	           <td>
	               <div class="eduright1" style='margin-left:800px;margin-top:-70px;width:400px;'>
    			        <?php foreach(array_combine($edus,$degrees) as $edu => $degree) { ?>
    			        <?php echo "<p >".str_replace('-', '<br /><br/>', $edu); "</p>"?>
    			        
    			        <form name="form5" action="EditEducation.php?id=<?php echo $degree; ?>" method="post">
    			        	<button name="edit" style="margin-left:60px;font-size: 17px;padding: 4px;display: none;">EDIT</button>
    			        </form>
    			        <br>
    			        <form name="form6" action="DeleteEducation.php?id=<?php echo $degree; ?>" method="post">
							<button onclick="alert('Are you sure you want to delete this record?')" style="margin-left:60px;font-size: 17px;padding: 4px;display: none;">DELETE</button><br><br><br><br><br><br>
						</form>
    			        <?php }"</p>" ?>
		            </div>
	           </td>
	       </tr>
	   </table>
	</section>
	
	<!-- Footer NavBar -->
	<footer id="skillfooter">
		<nav>
			<div class="bottomnav-left">
				<a href="HomePage.php">HOME</a>
		  		<a href="MySkills.php">MY SKILLS</a>
		  		<a href="Recommendation.php">RECOMMENDATION</a>
		  		<a href="Customers.php">CUSTOMERS</a>
		  		<a href="Works.php">WORKS</a>
		  		<button id="btn" onclick="div_show()">CONTACT FORM</button>
		  	</div>
		  	</div>
		  	<div id="footericon">
		  		<img src="Images/Footer-icons.png" alt="icon" width="150" height="30">
		  	</div>
		 </nav>
	</footer>

	
	<!-- Code for CONTACT FORM popup -->
	<section id="wrapper">
		<div id="contact">
			<div id="popupContact">
				<form action="ContactValidation.php" id="contactform" method="post" name="contactform" onsubmit="return validateContact()">
					<h3>Have a project you'd like to discuss?</h3>
					<span onclick="div_hide()" class="close" title="Close Modal">x</span>
					<hr>
					<label for="name">Name</label><br>
					<input id="name" name="name" placeholder="Enter a valid name" type="text" required><br><br>
					<label for="email">Email</label><br>
					<input id="email" name="email" placeholder="Enter a valid email" type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email should be in valid format. e.g. john_doe@gmail.com"><br><br>
					<label for="message">Message</label>
					<textarea rows="4" cols="50" name="message" words placeholder="Message" required maxlength="200" ></textarea>
					<button id="send" name="send">SEND</button>
				</form>
			</div>
		</div>
	</section>
	<!-- End of CONTACT FORM popup -->
	
	<!-- Code for LOGIN FORM popup -->
	<section id="wrapper">
		<div id="login">
			<div id="popupLogin">
				<form action="LoginValidation.php" id="loginform" method="post" name="loginform" onsubmit="return validateLogin()">
					<h3>Log in</h3>
					<span onclick="hide()" class="hide" title="Close Modal">x</span>
					<hr>
					<label for="name">User:</label><br>
					<input id="name" name="name" placeholder="Enter a valid username" type="text" required><br><br>
					<label for="password">Password:</label><br>
					<input id="password" name="password" placeholder="Enter a valid password" type="password" required ><br><br>
					<hr>
					<div id="buttonzone">
						<button id="close" onclick="hide()">CLOSE</button>
						<button id="save" name="getin">GET IN</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- End of LOGIN FORM popup -->

	<!-- Code for SIGNUP FORM popup -->
	<section id="wrapper">
		<div id="signup">
			<div id="popupSignup">
				<form action="SignupValidation.php" id="signupform" method="post" name="signupform" onsubmit="return validateSignup()">
					<h3>check in</h3>
					<span onclick="popout()" class="popout" title="Close Modal">x</span>
					<hr>
					<label for="name">Name:</label><br>
					<input id="name" name="name" placeholder="Enter a valid name" type="text" required><br><br>
					<label for="lastname">Last name:</label><br>
					<input id="lastname" name="lastname" placeholder="Enter valid Last name" type="text" required><br><br>
					<label for="email">Email:</label><br>
					<input id="email" name="email" placeholder="Enter a valid email" type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email should be in valid format. e.g. john_doe@gmail.com"><br><br>
					<label for="user">User:</label><br>
					<input id="user" name="user" placeholder="Enter a valid user name" type="text" required minlength="8" maxlength="16"><br><br>
					<label for="password">Password:</label><br>
					<input id="password" name="password" placeholder="Enter a valid password" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="form.repeatpassword.pattern = RegExp.escape(this.value);" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"><br><br>
					<label for="password">Repeat password:</label><br>
					<input id="repeatpassword" name="repeatpassword" placeholder="Enter matching password" type="password" required><br><br>
					<hr>
					<div id="buttonzone">
						<button id="close" onclick="popout()">CLOSE</button>
						<button id="save" name="save">SAVE</button>
					</div>
				</form>
			</div>
		</div>
	</section>
    <!-- End of SIGNUP FORM popup -->


    

</body>
</html>