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

	$selectQuery = "SELECT * FROM hire";
	$result=mysqli_query($conn, $selectQuery);

	while ($row = mysqli_fetch_array($result)) {
        $hire_images[]=$row['hire_image'];
        $hire_prices[]=$row['hire_price'];
        $purposes[]=$row['purpose'];
        $included_abilities[]=$row['included_ability'];
        $ids[]=$row['hire_id'];
    }

    $hires=array();
    foreach($hire_prices as $key=>$val){ 
    	$val1 = $included_abilities[$key];
        $val2 = str_replace(',', '<br />', $val1);
        $hires[$key] = $val.' - '.$val2;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>HireMe</title>
	<link rel="stylesheet" type="text/css" href="Style/portfolio.css">
	<script type="text/javascript" src="Script/script.js"></script>
	<script type="text/javascript" src="Script/ValidationScript.js"></script>
	
</head>
<body id="hire">

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

	<!-- Hire Me Section -->
	<section id="HireMe">
		<h1 class="leftspc">HIRE ME</h1>
		<p class="spc">I want to look back on my career and be proud of the work, <br> and be proud that I tried everything. --Jon Stewart</p>
	</section>
	<form name="form7" action="AddHire.php" method="post">
		<button onclick=""style="float:right;margin-right:400px;font-size: 17px;padding: 4px;display: none;">ADD HIRE</button>
	</form><br><br><br><br><br><br><br>
	<section class="hiretable">
		<table>
			<tr>
				<td>
					<article class="hireleft" style="margin-top:-100px;">
					   <?php foreach(array_combine($purposes,$hire_images) as $purpose => $hire_image) { ?>
						<h4><strong><?php echo $purpose; ?></strong></p>
						<img src="<?php echo $hire_image; ?>" alt="cart" width="230" height="170" style="margin-top:-60px;"><br><br><br><hr class="workhr" style="margin-top:25px;margin-left:-5px;width:1000px;"> <?php } ?>
					</article>
				</td>
				<td>
					<div style="margin-left:-600px;margin-top:-100px;">
						<?php foreach(array_combine($hires,$ids) as $hire => $id) { ?>
						<?php echo "<p >".str_replace('-', '<br /><br/>', $hire); "</p>"?>
						
						<form name="form8" action="EditHire.php?id=<?php echo $id; ?>" method="post">
							<button onclick="" style="margin-left:10px;font-size: 17px;padding: 4px;display: none;">EDIT</button>
						</form>
						<form name="form9" action="DeleteHire.php?id=<?php echo $id; ?>" method="post">
							<button onclick="alert('Are you sure you want to delete this record?')" style="margin-left:10px;font-size: 17px;padding: 4px;display: none;">DELETE</button>
						</form><br>
						<a class="desc" href="Customers.php" style="color:white;margin-top:-2px;"><strong class="str1">CONTACT US</strong></p>
						<?php } ?>
					</div>
				</td>
			</tr>
		</table>
		
	</section>
	<br><br><br><br><br><br>
	
	<!-- Skills and Knowledge Section -->
	<article id="knowledge" style="margin-top:-100px;">
		<h1 class="leftspc">SKILLS & KNOWLEDGE</h1>
		<p class="spc">I want to look back on my career and be proud of the work, <br> and be proud that I tried everything. --Jon Stewart</p>
	</article>

	<!-- Software Range Section -->
	<article id="skillleft">
		<h3 class="h3">SOFTWARE</h3>
		<div id="tooltip1">
			<span class="tooltiptext">92%</span>
		</div>
		<p class="sk">JAVA</p>
		<progress value="92" max="100" min="1" ></progress>
		<div id="tooltip2">
			<span class="tooltiptext">88%</span>
		</div>
		<p class="sk">HTML</p>
		<progress value="88" max="100" min="1"></progress>
		<div id="tooltip3">
			<span class="tooltiptext">85%</span>
		</div>
		<p class="sk">CSS</p>
		<progress value="85" max="100" min="1"></progress>
		<div id="tooltip4">
			<span class="tooltiptext">85%</span>
		</div>
		<p class="sk">ANGULAR JS</p>
		<progress value="85" max="100" min="1"></progress>
		<div id="tooltip5">
			<span class="tooltiptext">90%</span>
		</div>
		<p class="sk">MY SQL</p>
		<progress value="90" max="100" min="1"></progress><br><br><br><br><br>
	</article>

	<!-- Language Skills Section -->
	<article>
		<h3 class="h3">LANGUAGE SKILLS</h3>
		<figure id="lang">
			<img src="Images/Spanish.png" alt="spanish" width="150" height="150">
			<img src="Images/English.png" alt="english" width="150" height="150">
			<img src="Images/Italian.png" alt="italian" width="150" height="150">
		</figure>
	</article>

	<!-- Recognitions Section -->
	<article id="skillright">
		<h3 class="h3r">RECOGNITIONS</h3>
		<article id="leftreco">
			<img src="Images/Reco1.png" alt="Reco1" width="60" height="60"><br>
			<img src="Images/Reco2.png" alt="Reco2" width="60" height="60"><br>
			<img src="Images/Reco3.png" alt="Reco2" width="60" height="60">
		</article>
		<article class="rightreco">
			<p><span class="small">INTERNATIONAL DESIGN AWARDS 2014</span><br><br>15 March 2014 / New York State University <br> Place: 3</p>
			<p><span class="small">LOGO DESIGN CONTEST CHICAGO 2013?</span><br><br>12 October 2013 / Chicago House of Art<br> Place: 2</p>
			<p><span class="small">WEB DESIGN CONTEST NEW YORK 2013</span><br><br>12 October 2013 / New York Technology Office<br> Place: 2</p>
		</article>
	</article><br><br>

	<!-- Knowledge Section -->
	<div class="skright">
		<h3 class="h3r">KNOWLEDGE</h3>
		<ul class="knowledgelist">
			<li>Google Analytics</li>
			<li>Install and Configure</li>
			<li>3D Modelling</li>
			<li>Color Theory</li>
			<li>Web Usability</li>
			<li>Grid & Layout</li>
			<div class="kright">
				<li>Photo manipulation</li>
				<li>Digital Painting</li>
				<li>Photo Composition</li>
				<li>Good Topography</li>
				<li>Partial Retouching</li>
				<li>Video Editing</li>
			</div>
		</ul>
	</div>

	<!-- Hobbies and Interests Section -->
	<section id="last">
		<h3 class="h3">HOBBIES & INTERESTS</h3><br>
		<figure id="hobbies">
			<img src="Images/Sports.png" alt="Sports" width="60" height="60">
			<img src="Images/Photography.png" alt="Photography" width="60" height="60"><
			<img src="Images/Marketing.png" alt="Marketing" width="60" height="60">
			<img src="Images/Movies.png" alt="Movies" width="60" height="60">
			<img src="Images/Fashion.png" alt="Fashion" width="60" height="60">
			<img src="Images/Technology.png" alt="Technology" width="60" height="60">
			<img src="Images/Travel.png" alt="Travel" width="60" height="60">
			<img src="Images/History.png" alt="History" width="60" height="60">
			<img src="Images/Music.png" alt="Music" width="60" height="60">
		</figure>
		<p id="caption">&nbsp;&nbsp;Music Photography Marketing Movies Fashion Technology Travel History Music</p>
	</section>

	<!-- Footer NavBar -->
	<footer id="hirefooter">
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