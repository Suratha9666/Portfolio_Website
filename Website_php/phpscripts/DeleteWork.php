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
$query = "DELETE FROM work_experience WHERE work_id='$id'"; 
$result = mysqli_query($conn,$query) ;
header("Location: AdminSkills.php");
?>