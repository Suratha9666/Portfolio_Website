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
    $price =$_REQUEST['price'];
    $purpose = $_REQUEST['purpose'];
    $included_ability = $_REQUEST['ability'];
    
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    
    $ins_query="INSERT INTO hire(hire_image,hire_price,purpose,included_ability) VALUES('Images/$image','$price','$purpose','$included_ability')";
    if(mysqli_query($conn,$ins_query)){
        if(move_uploaded_file($tmp_image, "Images/$image")){
            $status = "New Record Inserted Successfully";
        }
        else{
            $status = "Error uploading image";
        }
    }
     header("Location: AdminHire.php");
    
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Insert New Hire</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Insert New Hire</h1>
<form name="form" method="post" action="" enctype="multipart/form-data"> 
<input type="hidden" name="new" value="1" />
<label for="start">Hire Price:</label><br>
<p><input type="text" id ="price" name="price" placeholder="Enter the Hire Price" style="height:20px;width:500px;" required /></p>
<label for="end">Purpose:</label><br>
<p><input type="text" id="purpose" name="purpose" placeholder="Enter the Purpose" style="height:20px;width:500px;" required /></p>
<label for="organization">Included Abilities:</label><br>
<p><input type="text" id="ability" name="ability" placeholder="Enter included abilities separated by commas without spaces" style="height:20px;width:500px;" required /></p>
<label for="role">Image:</label><br>
<p><input type="file" id="image" name="image" placeholder="Enter path of the Image" style="height:20px;width:500px;" required /></p><br>

<p><input name="submit" type="submit" value="Submit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>