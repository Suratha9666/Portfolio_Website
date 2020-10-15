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
$query = "SELECT * FROM latest_work WHERE latest_id='$id'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$img= $row['image'];

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $id=$_REQUEST['id'];
    $caption =$_REQUEST['caption'];
    $category = $_REQUEST['category'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    
    if($_FILES['image']['size'] == 0){
        $image=$img;
        $upd_query="UPDATE latest_work SET caption='".$caption."',category='".$category."',image='$image' WHERE latest_id='".$id."'";
    }
    else{
       $upd_query="UPDATE latest_work SET caption='".$caption."',category='".$category."',image='Images/$image' WHERE latest_id='".$id."'";
       move_uploaded_file($tmp_image, "Images/$image");
     }
     mysqli_query($conn,$upd_query);
     $status = "Record Updated Successfully";
     header("Location: AdminWorks.php");
    
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Update Work</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Update Work</h1>
<form name="form" method="post" action="" enctype="multipart/form-data"> 
<input type="hidden" name="new" value="1" />
<input name="latest_id" type="hidden" value="<?php echo $row['latest_id'];?>" />
<label for="caption">Caption:</label><br>
<p><input type="text" id ="caption" name="caption" value="<?php echo $row['caption'];?>" placeholder="Enter the Caption" style="height:20px;width:500px;" required /></p>
<label for="category">Category:</label><br>
<p><input type="text" id="category" name="category" value="<?php echo $row['category'];?>" placeholder="Enter the Category" style="height:20px;width:500px;" required /></p>
<label for="image">Image:</label><br>
<img src="<?php echo $img;?>" alt="work" width="230" height="170"><br><br>
<input type="file" id="image" name="image"/><br>
<br><br>
<p><input name="submit" type="submit" value="Submit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>