<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "details";
 
// Create connection
$conn = new mysqli($servername,$username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

$sqlquery="CREATE TABLE IF NOT EXISTS feedback (NAME VARCHAR(100),THERAPY VARCHAR(100),THERAPY_RATING INT,INTERFACE INT,OVERALL INT,COMMENT VARCHAR(1024));";
$conn->query($sqlquery);



$uname=$_POST["username"];
$therapy=$_POST["therapy"];
$trate=$_POST["therapy-rating"];
$inter=$_POST["interface"];
$over=$_POST["overall"];
$comment=$_POST["comments"];


$sqlquery = "INSERT INTO feedback VALUES('$uname','$therapy','$trate','$inter','$over','$comment');";
    
if($conn->query($sqlquery) === TRUE) {
    header("Location: html code.html");
    exit();
} else {
    echo "Error: " . $sqlquery . "<br>" . $conn->error;
}
session_destroy();
?>