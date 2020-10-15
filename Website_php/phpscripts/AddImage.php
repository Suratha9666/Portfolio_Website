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
    $caption =$_REQUEST['caption'];
    $category = $_REQUEST['category'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    
    $ins_query="INSERT INTO latest_work(image,caption,category) VALUES('Images/$image','$caption','$category')";
    if(mysqli_query($conn,$ins_query)){
        if(move_uploaded_file($tmp_image, "Images/$image")){
            $status = "New Record Inserted Successfully";
        }
        else{
            $status = "Error uploading image";
        }
    }
    header("Location: AdminWorks.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Insert New Work</title>
</head>
<body style="background-color:black;color:white;">
<div class="form">
<div>
<h1>Insert New Work</h1>
<form name="form" method="post" action="" enctype="multipart/form-data"> 
<input type="hidden" name="new" value="1" />
<label for="caption">Caption:</label><br>
<p><input type="text" id ="caption" name="caption" placeholder="Enter the Caption" style="height:20px;width:500px;" required /></p>
<label for="category">Category:</label><br>
<p><input type="text" id="category" name="category" placeholder="Enter the Category" style="height:20px;width:500px;" required /></p>
<label for="image">Image:</label><br>
<p><input type="file" id="image" name="image" style="height:20px;width:500px;" required /></p><br>
<p><input name="submit" type="submit" value="Submit" style="width:100px;color:blue;font-size:1000px;" /></p>
</form>
<p style="color:green;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>