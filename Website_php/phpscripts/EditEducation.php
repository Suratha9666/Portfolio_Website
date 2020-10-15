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

$id=$_REQUEST['id'];
$query = "SELECT * FROM education WHERE degree_id='$id'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $id=$_REQUEST['id'];
    $from =$_REQUEST['from'];
    $to = $_REQUEST['to'];
    $degree = $_REQUEST['degree'];
    $field = $_REQUEST['field'];
    $university = $_REQUEST['university'];
    $upd_query="UPDATE education SET degree_name='".$degree."',field_of_study='".$field."',university='".$university."',start_date='".$from."',end_date='".$to."'WHERE degree_id='".$id."'";
    mysqli_query($conn,$upd_query);
    $status = "Record Updated Successfully";
    header("Location: AdminSkills.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Update Education</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Update Education</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="degree_id" type="hidden" value="<?php echo $row['degree_id'];?>" />
<label for="start">From date:</label><br>
<p><input type="text" id ="from" name="from" value="<?php echo $row['start_date'];?>" placeholder="Enter From date in the format YYYY(Mon)" style="height:20px;width:500px;" required /></p>
<label for="end">To date:</label><br>
<p><input type="text" id="to" name="to" value="<?php echo $row['end_date'];?>" placeholder="Enter To date in the format YYYY(Mon) or PRESENT" style="height:20px;width:500px;" required /></p>
<label for="organization">Degree:</label><br>
<p><input type="text" id="degree" name="degree" value="<?php echo $row['degree_name'];?>" placeholder="Enter Degree name" style="height:20px;width:500px;" required /></p>
<label for="role">Field of Study:</label><br>
<p><input type="text" id="field" name="field" value="<?php echo $row['field_of_study'];?>" placeholder="Enter your field of study" style="height:20px;width:500px;" required /></p>
<label for="description">University:</label><br>
<p><input type="text" id="university" name="university" value="<?php echo $row['university'];?>" placeholder="Enter University name" style="height:20px;width:500px;" required /></p><br>
<p><input name="submit" type="submit" value="Submit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>