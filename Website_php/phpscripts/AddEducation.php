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
    $from =$_REQUEST['from'];
    $to = $_REQUEST['to'];
    $degree = $_REQUEST['degree'];
    $field = $_REQUEST['field'];
    $university = $_REQUEST['university'];
    $ins_query="INSERT INTO education(degree_name,field_of_study,university,start_date,end_date) VALUES('$degree','$field','$university','$from','$to')";
    mysqli_query($conn,$ins_query);
    $status = "New Record Inserted Successfully";
    header("Location: AdminSkills.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Insert New Education</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Insert New Education</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<label for="start">From date:</label><br>
<p><input type="text" id ="from" name="from" placeholder="Enter From date in the format YYYY(Mon)" style="height:20px;width:500px;" required /></p>
<label for="end">To date:</label><br>
<p><input type="text" id="to" name="to" placeholder="Enter To date in the format YYYY(Mon) or PRESENT" style="height:20px;width:500px;" required /></p>
<label for="organization">Degree:</label><br>
<p><input type="text" id="degree" name="degree" placeholder="Enter Degree name" style="height:20px;width:500px;" required /></p>
<label for="role">Field of Study:</label><br>
<p><input type="text" id="field" name="field" placeholder="Enter your field of study" style="height:20px;width:500px;" required /></p>
<label for="description">University:</label><br>
<p><input type="text" id="university" name="university" placeholder="Enter University name" style="height:20px;width:500px;" required /></p><br>
<p><input name="submit" type="submit" value="Submit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>