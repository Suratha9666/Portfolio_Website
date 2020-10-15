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
$query = "SELECT * FROM hire WHERE hire_id='$id'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$img= $row['hire_image'];

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $id=$_REQUEST['id'];
    $price =$_REQUEST['price'];
    $purpose = $_REQUEST['purpose'];
    $included_ability = $_REQUEST['ability'];
    
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    
    if($_FILES['image']['size'] == 0){
        $image=$img;
        $upd_query="UPDATE hire SET hire_price='".$price."',purpose='".$purpose."',included_ability='".$included_ability."',hire_image='$image' WHERE hire_id='".$id."'";
    }
    else{
       $upd_query="UPDATE hire SET hire_price='".$price."',purpose='".$purpose."',included_ability='".$included_ability."',hire_image='Images/$image' WHERE hire_id='".$id."'";
       move_uploaded_file($tmp_image, "Images/$image");
     }
     mysqli_query($conn,$upd_query);
     $status = "Record Updated Successfully";
     header("Location: AdminHire.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Update Hire</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Update Hire</h1>
<form name="form" method="post" action="" enctype="multipart/form-data"> 
<input type="hidden" name="new" value="1" />
<input name="hire_id" type="hidden" value="<?php echo $row['hire_id'];?>" />
<label for="start">Hire Price:</label><br>
<p><input type="text" id ="price" name="price" value="<?php echo $row['hire_price'];?>" placeholder="Enter the Hire Price" style="height:20px;width:500px;" required /></p>
<label for="end">Purpose:</label><br>
<p><input type="text" id="purpose" name="purpose" value="<?php echo $row['purpose'];?>" placeholder="Enter the Purpose" style="height:20px;width:500px;" required /></p>
<label for="organization">Included Abilities:</label><br>
<p><input type="text" id="ability" name="ability" value="<?php echo $row['included_ability'];?>" placeholder="Enter included abilities separated by commas without spaces" style="height:20px;width:500px;" required /></p>
<label for="image">Image:</label><br>
<img src="<?php echo $img;?>" alt="cart" width="230" height="170"><br><br>
<input type="file" id="image" name="image"/><br>
<br><br>
<p><input name="submit" type="submit" value="Submit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>