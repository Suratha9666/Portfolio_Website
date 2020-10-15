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
$query = "SELECT * FROM work_experience WHERE work_id='$id'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $id=$_REQUEST['id'];
    $start =$_REQUEST['start'];
    $end = $_REQUEST['end'];
    $organization = $_REQUEST['organization'];
    $role = $_REQUEST['role'];
    $description = $_REQUEST['description'];
    $upd_query="UPDATE work_experience SET role='".$role."',organization='".$organization."',from_date='".$start."',to_date='".$end."',description='".$description."' WHERE work_id='".$id."'";
    mysqli_query($conn,$upd_query);
    $status = "Record Updated Successfully";
    header("Location: AdminSkills.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Update Work Experience</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Update Work Experience</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="work_id" type="hidden" value="<?php echo $row['work_id'];?>" />
<label for="start">Start date:</label><br>
<p><input type="text" id ="start" name="start" value="<?php echo $row['from_date'];?>" placeholder="Enter Start date in the format YYYY(Mon)" style="height:20px;width:500px;" required /></p>
<label for="end">End date:</label><br>
<p><input type="text" id="end" name="end" value="<?php echo $row['to_date'];?>" placeholder="Enter End date in the format YYYY(Mon) or PRESENT" style="height:20px;width:500px;" required /></p>
<label for="organization">Organization:</label><br>
<p><input type="text" id="organization" name="organization" value="<?php echo $row['organization'];?>" placeholder="Enter Organization name" style="height:20px;width:500px;" required /></p>
<label for="role">Role:</label><br>
<p><input type="text" id="role" name="role" value="<?php echo $row['role'];?>" placeholder="Enter your role" style="height:20px;width:500px;" required /></p>
<label for="description">Description:</label><br>
<p><textarea rows="4" columns="20" style='width:500px;' id="description" name="description" placeholder="Enter Description" required ><?php echo $row['description'];?></textarea></p><br>
<p><input name="submit" type="submit" value="Edit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>