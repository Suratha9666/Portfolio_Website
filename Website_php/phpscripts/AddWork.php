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


$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $start =$_REQUEST['start'];
    $end = $_REQUEST['end'];
    $organization = $_REQUEST['organization'];
    $role = $_REQUEST['role'];
    $description = $_REQUEST['description'];
    $ins_query="INSERT INTO work_experience(role,organization,from_date,to_date,description) VALUES('$role','$organization','$start','$end','$description')";
    mysqli_query($conn,$ins_query);
    $status = "New Record Inserted Successfully";
    header("Location: AdminSkills.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Insert New Work Experience</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Insert New Work Experience</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<label for="start">Start date:</label><br>
<p><input type="text" id ="start" name="start" placeholder="Enter Start date in the format YYYY(Mon)" style="height:20px;width:500px;" required /></p>
<label for="end">End date:</label><br>
<p><input type="text" id="end" name="end" placeholder="Enter End date in the format YYYY(Mon) or PRESENT" style="height:20px;width:500px;" required /></p>
<label for="organization">Organization:</label><br>
<p><input type="text" id="organization" name="organization" placeholder="Enter Organization name" style="height:20px;width:500px;" required /></p>
<label for="role">Role:</label><br>
<p><input type="text" id="role" name="role" placeholder="Enter your role" style="height:20px;width:500px;" required /></p>
<label for="description">Description:</label><br>
<p><input type="text" id="description" name="description" placeholder="Enter Description" style="height:20px;width:500px;" required /></p><br>
<p><input name="submit" type="submit" value="Submit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>