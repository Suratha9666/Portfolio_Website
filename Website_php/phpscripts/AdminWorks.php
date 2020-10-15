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
    
    $myvar = $_POST['formVar'];
	if($myvar === "all" || empty($myvar)){
	     $query="SELECT * FROM latest_work"; 
	}
	else{
	   $query="SELECT * FROM latest_work WHERE category='".$myvar."'"; 
	}
	
	$result=mysqli_query($conn,$query);

	while ($row = mysqli_fetch_array($result)) {
        $images[]=$row['image'];
        $captions[]=strtoupper($row['caption']);
        $categories[]=$row['category'];
        $ids[]=$row['latest_id'];
    }

    $combos = array();
    foreach($captions as $key1=>$val1){ 
        $val3 = $categories[$key1]; 
        $combos[$key1] = $val1.' - '.$val3;
    }

    $imgs = array();
    foreach($ids as $key2=>$val2){ 
        $val = $images[$key2]; 
        $imgs[$key2] = $val2.'-'.$val;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Works</title>
	<link rel="stylesheet" type="text/css" href="Style/portfolio.css">
	<script type="text/javascript" src="Script/script.js"></script>
	<script type="text/javascript" src="Script/ValidationScript.js"></script>
	
</head>
<body id="works">

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

	<!-- Showing Works Section -->
	<section>
		<h1 class="leftspc">MY LATEST WORK</h1>
		<p class="spc">I want to look back on my career and be proud of the work, <br> and be proud that I tried everything. --Jon Stewart</p>
	</section>
	
	<form method=post name="myform" action="" style="display:none;">
		<input type="hidden" name="formVar" value="">
		<input type="submit" value="Send form!">
	</form>
	<div id="myDiv">
    	<button  onclick="document.myform.formVar.value='all'; document.myform.submit(); return false" style="padding:5px;margin-right:2px;margin-left:50px;">SHOW ALL</button>
    	<button  onclick="document.myform.formVar.value='websites'; document.myform.submit(); return false" style="padding:5px;margin-right:2px;margin-left:50px;">WEBSITES</button>
    	<button  onclick="document.myform.formVar.value='apps'; document.myform.submit(); return false" style="padding:5px;margin-right:2px;margin-left:50px;">APPS</button>
        <button  onclick="document.myform.formVar.value='design'; document.myform.submit(); return false" style="padding:5px;margin-right:2px;margin-left:50px;">DESIGN</button>
        <button  onclick="document.myform.formVar.value='photography'; document.myform.submit(); return false" style="padding:5px;margin-right:2px;margin-left:50px;">PHOTOGRAPHY</button>
    </div>
    
    
    <!-- Work Images Section -->
	<br><br><br>
	<form name="form10" action="AddImage.php" method="post">
		<button onclick=""style="margin-left:100px;font-size: 17px;padding: 4px;">ADD LATEST WORK</button><br><br><br>
	</form>
	<div class="portfolioContainer">
	    <?php foreach(array_combine($imgs,$combos) as $img => $combo) { ?>
        <div class="img1">
            <img class="websites" src="<?php echo substr($img,2); ?>" alt="images" width="150" height="200" style="margin-right:25px; margin-left:70px;margin-top:50px;"> 
            <p  style="float:right;margin-left:40px;margin-top:-200px;"><?php echo str_replace('-', '<br /><br />', $combo); ?></p><br>
            <form class="forms" name="form11" style="margin-top:-140px;margin-left:280px;" action="EditImage.php?id=<?php echo substr($img,0,1); ?>" method="post">
   		        <br><br><button onclick="" style="font-size: 14px;padding: 4px;">EDIT</button><br><br>
   	        </form>
   	        <form class="forms" name="form12" style="margin-top:-50px;margin-left:-50px;" action="DeleteImage.php?id=<?php echo substr($img,0,1); ?>" method="post">
		        <button onclick="alert('Are you sure you want to delete this record?')" style="font-size: 14px;padding: 4px;">DELETE</button>
	         </form>
          </div>
          <?php }?>
	</div>

	<!-- Footer NavBar -->
	<footer id="workfooter">
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