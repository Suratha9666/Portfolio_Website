<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
	<link rel="stylesheet" type="text/css" href="Style/portfolio.css">
	<script type="text/javascript" src="Script/script.js"></script>
	<script type="text/javascript" src="Script/ValidationScript.js"></script>
</head>
<body id="home">
	
	<!-- Header NavBar -->
	<header>
		<nav>
			<h1 align="left">Suratha Pyari BH</h1>
			<div class="topnav-right">
				<a href="AdminHome.php">HOME</a>
		  		<a href="AdminSkills.php">MY SKILLS</a>
		  		<a href="AdminRecommendation.php">RECOMMENDATION</a>
		  		<a href="AdminWorks.php">WORKS</a>
		  		<a href="http://surathapyari.uta.cloud">BLOG</a>
		  		<a href="AdminHire.php">HIRE ME</a>
		  		<button id="button" onclick="show()">LOG IN</button>
		  		<button id="button" onclick="popup()">SIGN UP</button>
		  	</div>
		</nav>
	</header>

	<!-- Welcome Section -->
	<div>
		<h1 class="welcome" align="center">Welcome to my website</h1>
		<p align="center">It is a great pleasure for me to receive your visit and <br> that my professional information is of your liking and meets what you are looking for.</p>

		<!-- Download Resume Section -->
		<div id="downloadbtn" align="center">
			<a href="Internship Resume New.docx" download>
				<button type="button"><img id="download" src="Images/download.jpg" alt="download" align="center">DOWNLOAD RESUME</button>
			</a>
		</div>
	</div>

	<!-- Footer NavBar -->
	<footer>
		<nav>
			<div class="bottomnav-left">
				<a href="AdminHome.php">HOME</a>
		  		<a href="AdminSkills.php">MY SKILLS</a>
		  		<a href="AdminRecommendation.php">RECOMMENDATION</a>
		  		<a href="AdminCustomers.php">CUSTOMERS</a>
		  		<a href="AdminWorks.php">WORKS</a>
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